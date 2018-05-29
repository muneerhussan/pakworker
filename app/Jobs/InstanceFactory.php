<?php

namespace App\Jobs;

use \Exception;

class InstanceFactory
{
    public static function getMail($className,$data=[])
    {
       $nameSpace = 'App\Mail\\';
       $class = $nameSpace.$className;
       if(class_exists($class))
       {
           if($data)
           {
               $class = new $class($data);
              
           }
           else
           {
               $class = new $class();
           }
       }
       else
       {
           throw new Exception("Class $className not exist");
       }
       return $class;
    }
}
