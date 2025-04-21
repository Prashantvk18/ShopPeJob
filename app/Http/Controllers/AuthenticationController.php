<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
   public function login()
   {
      return view('authentication.login');
   }

   public function login_user(Request $request)
   {

      $request->validate([
         'mobile' => [
            'required',
            'regex:/^[6-9][0-9]{9}$/'
         ],
      ], [
         'mobile.required' => 'Please enter your mobile number.',
         'mobile.regex' => 'Enter a valid 10-digit mobile number.',
      ]);


      // $last =  Session::get('last_loggedin');
      // Session::put('mobile_no' ,  $request->mobile_no);
      // $user = User::where('mobile_no' ,$request->mobile_no)->first();
      // if(count($user) > 0){
      //     if(($last ==  $user->last_loggedin && !is_null($user->last_loggedin))
      //     or is_null($user->last_loggedin)){
      //         if(\Auth::attempt($request->only('mobile_no','password'))){
      //             Session::put('last_loggedin' , time());
      //             $user->last_loggedin = Session::get('last_loggedin');
      //             $suer->save();
      //             return view('User.home');        
      //         }
      //         return redirect('/')->withError('Invalid Credential');
      //     }
      //     return redirect('/')->withError('Only one user at a time'); 
      // }{
      //     return redirect('/')->withError('No user Found');  
      // }

      $user = User::where('number', $request->mobile)->first();
      if ($user) {
         Auth::login($user);
         if ($user->is_active == 1) {
            Session::put('is_loggedIn', 1);
            Session::put('is_admin', $user->is_admin);
            return redirect('/');
         } else {
            // User is not active
            \Auth::logout();  // Optionally log out the user
            return redirect('/')->withError('Inactive User');
         }
      } else {
         $user_data = new User();
         $user_data->number = $request->mobile;
         $user_data->save();
      }

      return redirect('/')->withError('Invalid Credential');
   }

   public function logout()
   {
      \Auth::logout();
      session()->flush();
      return redirect('/');
   }
}
