<?php

namespace App\Http\Controllers;

use App\agents;
use App\users;
use App\settings;
use App\confirmations;
use App\gh;
use App\ph;
use App\plans;
use App\account;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{

public function index()
{
$settings=settings::where('id', '=', '1')->first();
return view('home.index')->with(array(
'settings' => $settings,
'title' => $settings->site_title,
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
));
}

//Licensing and registration route
public function licensing(){

return view('home.licensing')
->with(array(
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'title' => 'Licensing, regulation and registration',
'settings' => settings::where('id', '=', '1')->first(),
));
}

//Terms of service route
public function terms(){

return view('home.terms')
->with(array(
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'title' => 'Terms of Service',
'settings' => settings::where('id', '=', '1')->first(),
));
}

//Privacy policy route
public function privacy(){

return view('home.privacy')
->with(array(
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'title' => 'Privacy Policy',
'settings' => settings::where('id', '=', '1')->first(),
));
}

//FAQ route
public function faq(){

return view('home.faq')
->with(array(
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'title' => 'FAQs',
'settings' => settings::where('id', '=', '1')->first(),
));
}

//about route
public function about(){

return view('home.about')
->with(array(
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'title' => 'About',
'settings' => settings::where('id', '=', '1')->first(),
));
}

//Contact route
public function contact(){

return view('home.contact')
->with(array(
'mplans' => plans::where('type','Main')->get(),
'pplans' => plans::where('type','Promo')->get(),
'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
'title' => 'Contact',
'settings' => settings::where('id', '=', '1')->first(),
));
}

//send contact message to admin email
public function sendcontact(Request $request){

$settings=settings::where('id','1')->first();

$to = $settings->contact_email;
$subject = "Contact message from ".$settings->site_name;
$msg = substr(wordwrap($request['message'],70),0,350);
$headers = "From: ".$request['name'].": ".$request['email']."\r\n";
//send email
mail($to,$subject,$msg,$headers);

return redirect()->back()
->with('message', ' Your message was sent successfully!');

}

//update Profile photo to DB
public function updatephoto(Request $request){

$this->validate($request, [
'photo' => 'mimes:jpg,jpeg,png|max:5000',
]);

//photo
$img=$request->file('photo');
$upload_dir='images';

$image=$img->getClientOriginalName();
$move=$img->move($upload_dir, $image);
users::where('id', $request['id'])
->update([
'photo' => $image,
]);
return redirect()->back()
->with('message', 'Photo Updated Sucessful');
}

//return add account form
public function accountdetails(Request $request){
return view('updateacct')->with(array(
'title'=>'Update account details',
'settings' => settings::where('id', '=', '1')->first()
));
}
//update account and contact info
public function updateacct(Request $request){

users::where('id', $request['id'])
->update([
'bank_name' => $request['bank_name'],
'account_name' =>$request['account_name'],
'account_no' =>$request['account_number'],
'btc_address' =>$request['btc_address'],
'eth_address' =>$request['eth_address'],
]);
return redirect()->back()
->with('message', 'User updated Sucessful');
}

    //return add change password form
    public function changepassword(Request $request){
        return view('changepassword')->with(array('title'=>'Change Password','settings' => settings::where('id', '=', '1')->first()));
    }

    //Update Password
    public function updatepass(Request $request){
        if(!password_verify($request['old_password'],$request['current_password'])) {
            return redirect()->back()
            ->with('message', 'Incorrect Old Password');
        }
        $this->validate($request, [
            'password_confirmation' => 'same:password',
            'password' => 'min:6',
        ]);

        users::where('id', $request['id'])
                        ->update([
                            'password' => bcrypt($request['password']),
                        ]);
        return redirect()->back()
                        ->with('message', 'Password Updated Sucessful');
    }

    //Reset Password
    public function resetpswd(Request $request, $id){
        users::where('id', $id)
        ->update([
        'password' => bcrypt('user01236'),
        ]);
        return redirect()->back()
        ->with('message', 'Password has been reset to default');
    }

    //Delete user
    public function deluser(Request $request, $id){
        users::where('id', $id)->delete();
        return redirect()->back()
        ->with('message', 'User has been deleted!');
    }

    public function referuser(){
        return view('referuser')->with(array(
        'title'=>'Refer user',
        'settings' => settings::where('id', '=', '1')->first()));
    }

    public function signals(){
        return view('signals')
            ->with(array(
                'title'=>'signals',
                'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
}
