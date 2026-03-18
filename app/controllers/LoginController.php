<?php

namespace app\controllers;

class LoginController extends Controller {

    public function index() {

        return $this->view("login/index")->data();
    }
}