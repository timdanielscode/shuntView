<?php

namespace app\controllers;

use extensions\Auth;
use core\Session;

class LoginController extends Controller {

    public function index() {

        return $this->view("login/index")->data();
    }

    public function login($request) {

        if(Auth::success(['username' => $request]) === true) {
              
            Session::set("success", "Let’s go!");
            redirect("/");
        } else {
            redirect("/login");
        }
    }
}