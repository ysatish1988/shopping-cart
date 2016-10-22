<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

use Session;

class UserController extends Controller
{
   protected $request;	

   public function __construct(Request $request)
   {
   		$this->request = $request;
   }

   public function getSignUp()
   {
   		return view('user.signup');
   }


   public function postSignUp()
   {
   		$this->validate($this->request,[
   			'email' => 'required|email|unique:users',
   			'password' => 'required|min:4'
   		]);

   		$user = User::create([
            'email' => $this->request->input('email'),
            'password' => bcrypt($this->request->input('password'))
         ]);

         Auth::login($user);

         if (Session::has('oldUrl')) {
               $oldUrl = Session::get('oldUrl');
               Session::forget('oldUrl');
               return redirect()->to($oldUrl);
         }

         return redirect()->route("user.profile");
   }


   public function getSignIn()
   {
      return view('user.signin');
   }

   public function postSignIn()
   {
         $this->validate($this->request,[
            'email' => 'required|email',
            'password' => 'required|min:4'
         ]);

         if(Auth::attempt(['email'=>$this->request->input('email'), 'password'=>$this->request->input('password')]))
         {
            if ($this->request->session()->has('oldUrl')) {
               $oldUrl = $this->request->session()->get('oldUrl');
               $this->request->session()->forget('oldUrl');
               //echo $oldUrl;die;
               return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
         }

         return redirect()->back();
        
   }


   public function getProfile()
   {
      $orders = Auth::user()->orders();
      $orders = $orders->get();
      return view('user.profile', compact('orders'));
   }


   public function getLogout()
   {
      Auth::logout();
      flash()->success('Logout', 'You have been logout successfully..!!');
      return redirect()->route("product.index");
   }

}
