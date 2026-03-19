<?php

namespace app\controllers;

use extensions\Auth;
use core\Session;
use core\Csrf;
use validation\Rules;
use app\models\User;

class LoginController extends Controller {

    private $_data = [];

    public function index() {

        return $this->view("login/index")->data();
    }

    public function login($request) {

        $rules = new Rules();

        if($rules->login($request['username'], $request['password'], $request['token'], Csrf::get())->validated() ) {
           
            $this->auth($request);

        } else {

            $this->_data['username'] = $request['username'];
            $this->_data['password'] = $request['password'];
            $this->_data['rules'] = $rules->errors;

            return $this->view('login/index')->data($this->_data);
        }
    }

    private function checkAttempts() {

        if(Session::get('failed_login_attempt') == 3) {

            Session::set('too-many-attempts');
        }
    }

    private function auth($request) {

        if(Auth::success(['username' => $request]) === true && Session::get('failed_login_attempt') < 3) {
              
            Session::set("success", "Let’s go!");

            $data =  User::whereColumns(['id'], ['username' => $request['username']]);
            redirect("/trainer/" . $data[0]['id']);
        } else {
            redirect("/login");
        }
    }
}