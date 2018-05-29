<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Transformers\Json;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use \Exception;
use Validator;
use Illuminate\Support\Facades\Input;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getResetToken(Request $request)
    {
       try
       {
            $validator = Validator::make($request->all(), [
            'email' => 'required|email'
             ]);
            if($validator->fails())
            {
                return $this->jsonResponse(false,'Email is Required');
            }
            $user = User::where('email', $request->input('email'))->first();
            $data['token'] = $this->broker()->createToken($user);
            $data['mail']=User::whereEmail($request->email)->first();
            $data['name']=Input::get('name');
            \App\Jobs\SendEmail::dispatch('ForgotPasswordMail',$data); 
            return $this->jsonResponse(true,"Email is sent with varification token",'',200);
        }
        catch(Exception $ex)
       {
         return $this->jsonResponse(false,$this->exceptionToString($ex));
       }
    }   
}
