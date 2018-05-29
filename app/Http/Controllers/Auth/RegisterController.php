<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Events\UserRegistered;

class RegisterController extends Controller
{

    public $successStatus = 200;
     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'phone'    =>'required',
        ]);
    }
    public function register(Request $request)
    {
       try
        {  
          
          $validator=$this->validator($request);
           
          if ($validator->fails()) 
            {
                return $this->jsonResponse(false,$validator->errors()->first());  
            }
                $input = $request->all();
                $input['password'] = bcrypt($input['password']);
                $input['api_key']  = str_random(60);
                $user = User::create($input);
                event(new UserRegistered($user));
                return $this->jsonResponse(true,'User Created Successfully');
       }
        catch (\Exception $ex)
       {
            return $this->jsonResponse(false, $this->exceptionToString($ex));
       }
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */ 
}
