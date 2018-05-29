<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */public function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password'=>'required'
            ]);
                if($validator->fails())
                {
                    return $this->jsonResponse(false,$validator->errors());
                }
    }
     public function login()
     {
         
       try
         {
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
                {
                    $data['api_key'] =  Auth::user()->api_key;
                    return $this->jsonResponse(true,'Login successfully',$data);
                }
                else
                {
                    return $this->jsonResponse(false,'Unathorized User');
                }
         }
                 
        catch(\Exception $ex)
        {
           return $this->jsonResponse(false,'Unathorized User', $this->exceptionToString($ex));
        }
     }
}