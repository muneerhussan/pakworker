<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;   
    
    public function getParams()
    {
        $params = [];
        if(isset($_GET['params']))
        {
            $params = $_GET['params'];
        }
        else
        {
            $params = $_GET;
        }
        return $params;
    }
    
    public function jsonResponse($success,$message='',$data=[],$code='')
    {
        $response = ['success'=>$success,'message'=>$message,'data'=>$data,'code'=>$code];
        return response()->json($response);
    }
    
    public function exceptionToString($ex)
    {
        $message = $ex->getMessage();
        $message .= " File: ".$ex->getFile();
        $message .= ' Line: '.$ex->getLine();
        return $message;
    }
}
