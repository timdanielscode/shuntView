<?php

namespace validation;

use core\validation\Validate;
use core\Csrf;

class Rules {

    public $errors;

    public function register($username, $uniqueUsername, $password, $retypePassword, $addedToken, $csrf) {    

        $validation = new Validate();

        $validation->input(['username' => $username])->as("Username")->rules(["required" => true, "min" => 3, "max" => 20, "unique" => $uniqueUsername]);
        $validation->input(['password' => $password])->as("Password")->rules(["required" => true, "min" => 16]);       
        $validation->input(['retypePassword' => $retypePassword])->as("Password")->rules(["required" => true, "match" => $password]);
        $validation->input(['token' => $addedToken])->as('Token')->rules(['csrf' => $csrf]);
                    
        $this->errors = $validation->errors;
        return $this;
    }

    /**
     * To check for failed validation errors
     * 
     * @return mixed bool
     */
    public function validated() {

        if(empty($this->errors) ) {

            return true;
        }
    }
}
 