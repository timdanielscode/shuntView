<?php

namespace app\controllers;

use app\models\User;
use core\Session;

class RegisterController extends Controller {

    public function index() {

        return $this->view("register/index")->data();
    }

    public function store($request) {

        User::insert([

            'username' => $request["username"],
            'password' => password_hash($request["password"], PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        Session::set("success", "You have been successfully registered!");
             
        redirect('/'); 
    }
}