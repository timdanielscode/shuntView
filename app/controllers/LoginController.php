<?php

namespace app\controllers;

use extensions\Auth;
use core\Session;
use core\Csrf;
use validation\Rules;

class LoginController extends Controller {

    public function index() {

        return $this->view("login/index")->data();
    }

    public function login($request) {

        $rules = new Rules();

        if($rules->login($request['username'], $request['password'], $request['token'], Csrf::get())->validated()) {
           
            $this->auth($request);

        } else {

            $this->_data['username'] = $request['username'];
            $this->_data['password'] = $request['password'];
            $this->_data['rules'] = $rules->errors;

            return $this->view('login/index')->data($this->_data);
        }
    }

    private function auth($request) {

        if(Auth::success(['username' => $request]) === true) {
              
            Session::set("success", "Let’s go!");
            redirect("/");
        } else {
            redirect("/login");
        }
    }
}