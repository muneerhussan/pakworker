<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Transformers\Json;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */
    use ResetsPasswords;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        try
        {
               $validator = Validator::make($request->all(), [
               'email' => 'required|email',
               'token' => 'required',
               'password' => 'required|confirmed|min:6',
            ]);
               if ($validator->fails()) 
                {
                    return $this->jsonResponse(false,$validator->errors()->first(),[],401);  
                }
                    $response = $this->broker()->reset(
                    $this->credentials($request), function ($user, $password) {
                    $this->resetPassword($user, $password);
                    }
        );
            if ($response == Password::PASSWORD_RESET) {
                return response()->json(Json::response(null, trans('passwords.reset')));
            } else {
                return response()->json(Json::response($request->input('email'), trans($response), 202));
            }
        return $response == Password::PASSWORD_RESET
        ? $this->sendResetResponse($response)
        : $this->sendResetFailedResponse($request, $response);
        }
        catch(\Exception $ex)
        {
            return $this->jsonResponse(false,$this->exceptionToString($ex));
        }
      
    }
}