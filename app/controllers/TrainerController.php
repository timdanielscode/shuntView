<?php

namespace app\controllers;

use app\models\User;

class TrainerController extends Controller {

    private $_data = [];

    public function index($request) {

        return $this->view("trainer/index")->data();
    }
}