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

    public function encountersAndIvs($encounters, $hp, $def, $att, $spd, $spa, $spe) {    

        $validation = new Validate();

        $validation->input(['encounters' => $encounters])->as("encounters")->rules(["min" => 1, "max" => 6, "numeric" => true]);
        $validation->input(['hp' => $hp])->as("hp")->rules(["min" => 1, "max" => 2, "numeric" => true]);
        $validation->input(['def' => $def])->as("def")->rules(["min" => 1, "max" => 2, "numeric" => true]);
        $validation->input(['att' => $att])->as("att")->rules(["min" => 1, "max" => 2, "numeric" => true]);
        $validation->input(['spd' => $spd])->as("spd")->rules(["min" => 1, "max" => 2, "numeric" => true]);
        $validation->input(['spa' => $spa])->as("spa")->rules(["min" => 1, "max" => 2, "numeric" => true]);
        $validation->input(['spe' => $spe])->as("spe")->rules(["min" => 1, "max" => 2, "numeric" => true]);
                    
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
 