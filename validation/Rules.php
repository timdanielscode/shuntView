<?php

namespace validation;

use core\validation\Validate;
use core\Csrf;

class Rules {

    public $errors;

    public function register($username, $uniqueUsername, $password, $retypePassword, $addedToken, $csrf) {    

        $validation = new Validate();

        $validation->input(['username' => $username])->as("Username")->rules(["required" => true, "min" => 3, "max" => 20, "unique" => $uniqueUsername, "special" => true]);
        $validation->input(['password' => $password])->as("Password")->rules(["required" => true, "min" => 16, "max" => 99]);       
        $validation->input(['retypePassword' => $retypePassword])->as("Password")->rules(["required" => true, "match" => $password]);
        $validation->input(['token' => $addedToken])->as('Token')->rules(['csrf' => $csrf]);
                    
        $this->errors = $validation->errors;
        return $this;
    }

    public function login($username, $password, $addedToken, $csrf) {    

        $validation = new Validate();

        $validation->input(['username' => $username])->as("Username")->rules(["required" => true, "min" => 3, "max" => 20, "special" => true]);
        $validation->input(['password' => $password])->as("Password")->rules(["required" => true, "min" => 16, "max" => 99]);       
        $validation->input(['token' => $addedToken])->as('Token')->rules(['csrf' => $csrf]);
                    
        $this->errors = $validation->errors;
        return $this;
    }

    public function shiny($hp, $def, $att, $spd, $spa, $spe) {    

        $validation = new Validate();

        $validation->input(['hp' => $hp])->as("hp")->rules(["required" => true, "min" => 1, "max" => 2]);
        $validation->input(['def' => $def])->as("def")->rules(["required" => true, "min" => 1, "max" => 2]);
        $validation->input(['att' => $att])->as("att")->rules(["required" => true, "min" => 1, "max" => 2]);
        $validation->input(['spd' => $spd])->as("spd")->rules(["required" => true, "min" => 1, "max" => 2]);
        $validation->input(['spa' => $spa])->as("spa")->rules(["required" => true, "min" => 1, "max" => 2]);
        $validation->input(['spe' => $spe])->as("spe")->rules(["required" => true, "min" => 1, "max" => 2]);
                    
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
 