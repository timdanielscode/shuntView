<?php

namespace app\controllers;

use app\models\Api;
use app\models\Pokemon;
use core\Session;

class TrainerController extends Controller {

    private $_data = [];

    public function index($request) {

        $this->_data['id'] = $request['id'];

        return $this->view("trainer/index")->data($this->_data);
    }
}