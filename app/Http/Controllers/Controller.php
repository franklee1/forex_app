<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use App\User;
use App\settings;
use App\account;
use App\plans;
use App\agents;
use App\confirmations;
use App\users;
use App\deposits;
use App\withdrawals;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
	public function dashboard(Request $request)
    {
        //log user out if not approved
        if(Auth::user()->status != "active"){
          $request->session()->flush();
          $request->session()->put('reged','yes');
          return redirect()->route('dashboard');
        }
        //Check if the user is referred by someone after a successful registration
          $settings=settings::where('id','1')->first();
            if($request->session()->has('ref_by')) {
            $ref_by = $request->session()->get('ref_by');
            //update the user ref_by with the referral ID 
            users::where('id', Auth::user()->id)
            ->update([
            'ref_by' => $ref_by,
            ]);

          //check if the refferral already exists
          if(count(agents::where('id',$ref_by)->first())>0){
            //update the agent info
            DB::table('agents')->increment('total_refered', 1)
          ->where('id',$ref_by);
          }
          else{
            //add the referee to the agents model

          $agent_id = DB::table('agents')->insertGetId(
            [
              'agent' => $ref_by,
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ]
           );
          //increment refered clients by 1
          agents::where('id',$agent_id)->increment('total_refered', 1);
            }
            $request->session()->forget('ref_by');
          }
        

	      //check for users without ref link and update them with it
          $usf=users::all();
          foreach($usf as $usf){
            //if the ref_link column is empty
            if($usf->ref_link==''){
              users::where('id', $usf->id)
            ->update([
            'ref_link' => $settings->site_address.'/ref/'.$usf->id,
            'ref_bonus' => '0',
            'bonus_released' => '0',
            ]);
          }
          } 

          //fetch user plans and calculate earnings
         /* if(Auth::user()->plan > 0 && Auth::user()->promo_plan > 0 && Auth::user()->confirmed_plan > 0){
          $mplan=plans::where('id',Auth::user()->confirmed_plan)->first();
          $pplan=plans::where('id',Auth::user()->promo_plan)->first();

          $earnings=$mplan->price + $pplan->price;
          }
          else{
            $earnings=0;
          }*/

          //calculate top up earnings and
          //auto increment earnings after the increment time
          $users=users::all();
          foreach($users as $cf){
            //if user have joined both plans and confirmed and Trading mode is on
            if($cf->plan > 0 && $cf->confirmed_plan > 0 && $settings->trade_mode=='on'){
            
            //get the user plans/packages and calculate to receive
            $ucp=plans::where('id',$cf->confirmed_plan)->first();
            //get the increment time
            $to_receive=$ucp->expected_return;

            if($ucp->increment_interval=="Monthly"){
              $togrow=\Carbon\Carbon::now()->subMonths(1)->toDateTimeString();
              $dtme = $cf->last_growth->diffInMonths();
            }elseif($ucp->increment_interval=="Weekly"){
              $togrow=\Carbon\Carbon::now()->subWeeks(1)->toDateTimeString();
              $dtme = $cf->last_growth->diffInWeeks();
            }elseif($ucp->increment_interval=="Daily"){
              $togrow=\Carbon\Carbon::now()->subDays(1)->toDateTimeString();
              $dtme = $cf->last_growth->diffInDays();
            }elseif($ucp->increment_interval=="Hourly"){
              $togrow=\Carbon\Carbon::now()->subHours(1)->toDateTimeString();
              $dtme = $cf->last_growth->diffInHours();
            }

            //expiration
            if($ucp->expiration=="One week"){
              $condition=$cf->account_bal < $to_receive && $cf->activated_at->diffInDays() < 7;
            }elseif($ucp->expiration=="One month"){
              $condition=$cf->account_bal < $to_receive && $cf->activated_at->diffInDays() < 30;
            }elseif($ucp->expiration=="Six months"){
              $condition=$cf->account_bal < $to_receive && $cf->activated_at->diffInDays() < 183;
            }
            elseif($ucp->expiration=="One year"){
              $condition=$cf->account_bal < $to_receive && $cf->activated_at->diffInDays() < 365;
            }

            //calculate increment
            if($ucp->increment_type=="Percentage"){
              $increment=($ucp->price*$ucp->increment_amount)/100;
            }else{
              $increment=$ucp->increment_amount;
            }
            
            if($condition){

              if($cf->last_growth <= $togrow){
              $amt = intval($dtme/1);
              if($amt >1){
               // return($amt);
                users::where('id', $cf->id)
                ->update([
                'account_bal' => $cf->account_bal+$increment,
                ]);
              }
              else{
                users::where('id', $cf->id)
                ->update([
                'account_bal' => $cf->account_bal+$increment,
                'last_growth' => \Carbon\Carbon::now()
                ]);
              }
              }
            }
            }
          }
          
           
      
        if($settings->payment_mode=='Bank transfer'){
          $condition=empty(Auth::user()->account_no) or empty(Auth::user()->account_name) or empty(Auth::user()->bank_name) or empty(Auth::user()->phone);
        }elseif($settings->payment_mode=='BTC'){
          $condition=empty(Auth::user()->btc_address) or empty(Auth::user()->phone);
        }elseif($settings->payment_mode=='ETH'){
          $condition=empty(Auth::user()->eth_address) or empty(Auth::user()->phone);
        }else{
          $condition=empty(Auth::user()->id);
        }

      	if($condition and $request->session()->has('skip_account')!=true){
      		return view('updateacct')->with(array('title'=>'Update account details',
      		'settings' => settings::where('id', '=', '1')->first()));
        }
        elseif(Auth::user()->plan=='0'){
          return view('mplans')
        ->with(array(
        'title'=>'Select a plan for free',
        'plans'=> plans::where('type', 'main')->orderby('created_at','ASC')->get(),
        'settings' => settings::where('id', '=', '1')->first(),
        ));
        }
      	else{
        return view('dashboard')
        ->with(array(
        //'earnings'=>$earnings,
        'title'=>'User panel',
        'upplan' => plans::where('id', Auth::user()->promo_plan)->first(),
        'uplan' => plans::where('id', Auth::user()->plan)->first(),
        'last_profit'=>array_random([10.12,2.3,5.7,20,80.22,50.89,30,40.23,5,60,89,4,200.76,140,410.34,103.34]),
        'last_lost'=>array_random([10.2,1.99,30,22,3.32,51.03,12.3,30,3,4,5,6,20,4]),
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    	}
    } 

      //Skip enter account details
      public function skip_account(Request $request)
      {
        $request->session()->put('skip_account', 'skip account');
        return redirect()->route('dashboard');
      } 
  

    //Return deposit route
    public function deposits()
    {
    	return view('deposits')
        ->with(array(
        'title'=>'Deposits',
        'deposits' => deposits::where('user', Auth::user()->id)->get(),
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    } 

     //Return withdrawals route
     public function withdrawals()
     {
       return view('withdrawals')
         ->with(array(
         'title'=>'withdrawals',
         'withdrawals' => withdrawals::where('user', Auth::user()->id)->get(),
         'settings' => settings::where('id', '=', '1')->first(),
         ));
     } 

      //Return manage users route
      public function manageusers()
      {
        return view('users')
          ->with(array(
          'title'=>'All users',
          'users' => users::all(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

      //Return manage withdrawals route
      public function mwithdrawals()
      {
        return view('mwithdrawals')
          ->with(array(
          'title'=>'Manage users withdrawals',
          'withdrawals' => withdrawals::all(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

      //Return manage deposits route
      public function mdeposits()
      {
        return view('mdeposits')
          ->with(array(
          'title'=>'Manage users deposits',
          'deposits' => deposits::all(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

      //Return agents route
      public function agents()
      {
        return view('agents')
          ->with(array(
          'title'=>'Manage agents',
          'agents' => agents::all(),
          'settings' => settings::where('id', '=', '1')->first(),
          ));
      }

       //process deposits
     public function pdeposit($id){
      
      //confirm the users plan
      $deposit=deposits::where('id',$id)->first();
      $user=users::where('id',$deposit->user)->first();
      if($deposit->user==$user->id){
        users::where('id',$user->id)
      ->update([
      'confirmed_plan' => $deposit->plan,
      'activated_at' => \Carbon\Carbon::now(),
      'last_growth' => \Carbon\Carbon::now(),
      ]);
        //get plan
        $p=plans::where('id',$deposit->plan)->first();
        //get settings 
        $settings=settings::where('id', '=', '1')->first();
        $earnings=$settings->referral_commission*$p->price/100;

      //increment the user's referee total clients activated by 1
      agents::where('agent',$user->ref_by)->increment('total_activated', 1);
      agents::where('agent',$user->ref_by)->increment('earnings', $earnings);
      }

      //update deposits
      deposits::where('id',$id)
      ->update([
      'status' => 'Processed',
      ]);
      return redirect()->back()
      ->with('message', 'Action Sucessful!');
    }

     //process withdrawals
     public function pwithdrawal($id){

      $withdrawal=withdrawals::where('id',$id)->first();
      $user=users::where('id',$withdrawal->user)->first();
      if($withdrawal->user==$user->id){
        //debit the processed amount
        users::where('id',$user->id)
      ->update([
      'account_bal' => $user->account_bal-$withdrawal->amount,
      ]);
      }
      withdrawals::where('id',$id)
      ->update([
      'status' => 'Processed',
      ]);
      return redirect()->back()
      ->with('message', 'Action Sucessful!');
      }

      //Clear user Account
      public function clearacct(Request $request, $id){
        users::where('id', $id)
        ->update([
        'account_bal' => '0',
        ]);
        return redirect()->back()
        ->with('message', 'Account cleared to $0.00');
      }

    //Plans route
    public function plans()
    {
    	return view('plans')
        ->with(array(
        'title'=>'System Plans',
        'plans'=> plans::where('type', 'Main')->orderby('created_at','ASC')->get(),
        'pplans'=> plans::where('type', 'Promo')->get(),
        'settings' => settings::where('id','1')->first(),
        ));
    }

     //Trash Plans route
     public function trashplan($id)
     {
      plans::where('id',$id)->delete();
      return redirect()->back()
      ->with('message', 'Action Sucessful!');
     }

      //Update plans
      public function updateplan(Request $request){
  
        plans::where('id', $request['id'])
        ->update([
        'name' => $request['name'],
        'price' => $request['price'],
        'expected_return' => $request['return'],
        'increment_type' => $request['t_type'],
        'increment_amount' => $request['t_amount'],
        'increment_interval' => $request['t_interval'],
        'type' => 'Main',
        'expiration' => $request['expiration'],
        ]);
        return redirect()->back()
        ->with('message', 'Action Sucessful!');
      }

    //Main Plans route
    public function mplans()
    {
    	return view('mplans')
        ->with(array(
        'title'=>'Main Plans',
        'plans'=> plans::where('type', 'main')->get(),
        'settings' => settings::where('id','1')->first(),
        ));
    }

    //Promo Plans route
    public function pplans()
    {
    	return view('pplans')
        ->with(array(
        'title'=>'Promo Plans',
        'plans'=> plans::where('type', 'promo')->get(),
        'settings' => settings::where('id','1')->first(),
        ));
    }

     //Jon a plan
     public function joinplan($id){
  
      $plan=plans::where('id',$id)->first();
      if($plan->type=='Main'){
        users::where('id',Auth::user()->id)
        ->update([
          'plan'=>$plan->id,
          'entered_at'=>\Carbon\Carbon::now(),
        ]);
      }elseif($plan->type=='Promo'){
        users::where('id',Auth::user()->id)
        ->update([
          'promo_plan'=>$plan->id,
        ]);
      }
      return redirect()->route('dashboard')
      ->with('message', 'Congratulations! You successfully joined a plan.');
    }

    //Add plan requests
    public function addplan(Request $request){
       
      $plan=new plans();

      $plan->name= $request['name'];
      $plan->price= $request['price'];
      $plan->expected_return= $request['return'];
      $plan->increment_type= $request['t_type'];
      $plan->increment_interval= $request['t_interval'];
      $plan->increment_amount= $request['t_amount'];
      $plan->expiration= $request['expiration'];
      $plan->type= 'Main';
      $plan->save();
    return redirect()->back()
    ->with('message', 'Plan created Sucessful!');
  }

    //support route
    public function support()
    {
    	return view('support')
        ->with(array(
        'title'=>'Support',
        'settings' => settings::where('id', '=', '1')->first(),
        ));
    } 
    
    public function saveuser(Request $request){

      $this->validate($request, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
      'Answer' => 'same:Captcha_Result',
      ]);


      $thisid = DB::table('users')->insertGetId( 
        [
          'name'=>$request['name'],
          'email'=>$request['email'],
          'photo'=>'male.png',
          'ref_by'=>Auth::user()->id,
          'password'=>bcrypt($request['password']),
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now(),
        ]
       );

       //assign referal link to user
        $settings=settings::where('id', '=', '1')->first();

        users::where('id', $thisid)
          ->update([
          'ref_link' => $settings->site_address.'/'.$thisid,
          ]);
        return redirect()->back()
        ->with('message', 'User Registered Sucessful!');
  }

   //block user
   public function ublock($id){
  
    users::where('id',$id)
    ->update([
    'status' => 'blocked',
    ]);
    return redirect()->back()
    ->with('message', 'Action Sucessful!');
  }

   //unblock user
   public function unblock($id){

    users::where('id',$id)
    ->update([
    'status' => 'active',
    ]);
    return redirect()->back()
    ->with('message', 'Action Sucessful!');
  }
  
  //route Refer user route
  public function ref(Request $request, $id){
    if(isset($id)){
    if(count(users::where('id',$id)->first())==1){
      $request->session()->put('ref_by', $id);
    }
    return redirect()->route('home');
  }
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
        if(!password_verify($request['old_password'],$request['current_password']))
        {
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

    public function referuser(){
      return view('referuser')->with(array(
        'title'=>'Refer user',
        'settings' => settings::where('id', '=', '1')->first()));

    }  

}

