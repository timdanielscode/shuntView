<?php
            
namespace middleware;
                
use core\Session; 

class AuthMiddleware {
                
    public function __construct($run, $value = null) {
 
        if(Session::exists("logged_in") === true) {

            return $run();
        }
    }
}  