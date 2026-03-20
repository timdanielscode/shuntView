<?php

namespace app\controllers;

use app\models\Api;
use core\Session;

class TrainerController extends Controller {

    private $_data = [];

    public function index($request) {

        $api = new Api();
        $pokemonName = $api->getName($request['pokemonId']);

        Session::set("pokemonId", $request['pokemonId']);
        Session::set("pokemonName", $pokemonName);

        return $this->view("trainer/index")->data();
    }

    public function store($request) {

        print_r($request);
    }
}