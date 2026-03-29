<?php

namespace app\controllers;

use app\models\User;
use core\Session;
use core\Csrf;
use validation\Rules;

class RegisterController extends Controller {

    private $_data = [];

    public function index() {

        return $this->view("register/index")->data();
    }

    public function store($request) {

        $rules = new Rules();

        if($rules->register($request['username'], User::where(['username' => $request['username']]), $request['password'], $request['retypePassword'], $request['token'], Csrf::get())->validated()) {

            User::insert([

                'username' => $request["username"],
                'password' => password_hash($request["password"], PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            Session::set("success", "You have been successfully registered!");
                
            redirect('/login');
        } else {

            $this->_data['username'] = $request['username'];
            $this->_data['password'] = $request['password'];
            $this->_data['rules'] = $rules->errors;

            return $this->view('register/index')->data($this->_data);
        }
    }
}