<?php

namespace app\controllers;

use app\models\User;

class RegisterController extends Controller {

    public function index() {

        return $this->view("register/index")->data();
    }

    public function store($request) {

        User::insert([

            'username' => $request['username'],
            'password' => password_hash($request['password'], PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
             
        redirect('/'); 
    }
}