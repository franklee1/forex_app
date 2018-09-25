<?php

namespace App\Http\Controllers;

use App\settings;
use App\users;
use App\ph;
use App\gh;
use App\withdrawals;
use App\deposits;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    

     //return settings form
    public function settings(Request $request){
      include'currencies.php';
      return view('settings')->with(array(
        'settings' => settings::where('id', '=', '1')->first(),
        'currencies' => $currencies,
        'title' =>'System Settings'));
      //return view('settings')->with(array('settings' => settings::where('id', '=', '1')->first(),'title' =>'System Settings'));
    }

        //save Setttings to DB
        public function updatesettings(Request $request){
          $this->validate($request, [
            'logo' => 'mimes:jpg,jpeg,png|max:500',
            ]);
          /*if($request['payment_mode']=='BTC'){
            $currency='BTC';
          }elseif($request['payment_mode']=='ETH'){
            $currency='ETH';
          }else{
            $currency=$request['currency'];
          }*/
          
          $settings = settings::where('id', '=', '1')->first();
          if(empty($request->file('logo'))){
            $image=$settings->logo;
          }else{
           //process logo
          $img=$request->file('logo');
          $upload_dir='images';
          $image=$img->getClientOriginalName();
          $move=$img->move($upload_dir, $image);
          }

          if(isset($request['trade_mode']) and $request['trade_mode']=='on'){
            $trade_mode="on";
          }else{
            $trade_mode="off";
          }

          settings::where('id', $request['id'])
          ->update([
          'site_name'=>$request['site_name'],
          'description'=>$request['description'],
          'keywords'=>$request['keywords'],
          'site_title'=>$request['site_title'],
          'currency'=>$request['currency'],
          'payment_mode'=>$request['payment_mode'],
          'logo'=>$image,
          'site_address'=>$request['site_address'],
          'btc_address'=>$request['btc_address'],
          'update'=>$request['update'],
          'referral_commission'=>$request['ref_commission'],
          'trade_mode'=>$trade_mode,
          ]);
          return redirect()->back()
          ->with('message', 'Action Sucessful');
    }

     //Trading history route
     public function tradinghistory(){
      
      return view('thistory')
      ->with(array(
        'amount'=>array_random([10.12,2.3,5.7,20,80.22,50.89,30,40.23,5,60,89,4,200.76,140,410.34,103.34]),
        'id'=>array_random(['#2321','#8735','#0286','#1037','#9027','#3426','#0082','#3246','#0002','#1002','#0052','#2321']),
        'profitloss'=>array_random(['Profit','Loss']),
        'date'=>\Carbon\Carbon::now(),
        'title' => 'Trading History',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


    //payment route
    public function payment(Request $request){
      
      return view('payment')
      ->with(array(
        'amount'=>$request->session()->get('amount'),
        'payment_mode'=>$request->session()->get('payment_mode'),
        'pay_type' => $request->session()->get('pay_type'),
        'plan_id' => $request->session()->get('plan_id'),
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

    //top up route
    public function topup(Request $request){
      $user=users::where('id',$request['user_id'])->first();
      $user_bal=$user->account_bal;
      users::where('id', $request['user_id'])
          ->update([
          'account_bal'=> $user_bal + $request['amount'],
          ]);
          return redirect()->back()
          ->with('message', 'Action Successful!');
    }

    //Return payment page
    public function deposit(Request $request){
      //store payment info in session
      $request->session()->put('amount', $request['amount']);
      $request->session()->put('payment_mode', $request['payment_mode']);

      if(isset($request['pay_type'])){
      $request->session()->put('pay_type', $request['pay_type']);
      $request->session()->put('plan_id', $request['plan_id']);
      }

      return redirect()->route('payment')
      ->with(array(
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Save deposit requests
  public function savedeposit(Request $request){

      $this->validate($request, [
      'proof' => 'mimes:jpg,jpeg,png|max:4000',
      ]);
        
        //screenshot
        $img=$request->file('proof');
        $upload_dir='uploads';
        
        $image=$img->getClientOriginalName();
        $move=$img->move($upload_dir, $image);
        //end screenshot process
        
        if($request['pay_type']=='plandeposit'){
          //add the user to this plan for approval
          users::where('id',Auth::user()->id)
          ->update([
            'plan'=> $request['plan_id'],
          ]);
          $plan=$request['plan_id'];
        }
        else{
          $plan=NULL;
        }
       
    $dp=new deposits();

    $dp->amount= $request['amount'];
    $dp->payment_mode= 'On request';
    $dp->status= 'Pending';
    $dp->proof= $image;
    $dp->plan= $plan;
    $dp->user= Auth::user()->id;
    $dp->save();

    // Kill the session variables
    $request->session()->forget('plan_id');
    $request->session()->forget('pay_type');
    $request->session()->forget('payment_mode');
    $request->session()->forget('amount');

  return redirect()->back()
  ->with('message', 'Action Sucessful! Please wait for system to validate your request.');
}

    //Save withdrawal requests
     public function withdrawal(Request $request){
       
            $wd=new withdrawals();

            if(Auth::user()->account_bal >= $request['amount']){
            $wd->amount= $request['amount'];
            $wd->payment_mode= 'On request';
            $wd->status= 'Pending';
            $wd->user= Auth::user()->id;
            $wd->save();
          return redirect()->back()
          ->with('message', 'Action Sucessful! Please wait for system to process your request.');
          }else{
            return redirect()->back()
          ->with('message', 'Sorry, your account balance is insufficient for this request.');
          }
    }


}
