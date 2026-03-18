<?php

namespace app\controllers;

use extensions\Auth;

class LoginController extends Controller {

    public function index() {

        return $this->view("login/index")->data();
    }

    public function login($request) {

        if(Auth::success(['username' => $request]) === true) {
              
            redirect("/");
        } else {
            redirect("/login");
        }
    }
}