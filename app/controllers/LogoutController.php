<?php
             
namespace app\controllers;

use core\Session;
                
class LogoutController extends Controller {
                
    public function logout() {    
                     
        Session::delete("logged_in");
        
        redirect("/");
    }
}  