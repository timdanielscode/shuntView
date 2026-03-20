<?php

namespace app\controllers;

use app\models\Api;
use app\models\Pokemon;
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

        $id = explode('?', $request['id']);

        Pokemon::insert([
            
            'id' => Session::get('pokemonId'),
            'name' => Session::get("pokemonName"),
            'created_at' => date("Y-m-d H:i:s"),
            'gameId' => $request['gameId'],
            'userId' => $id[0]
        ]);

        redirect('/trainer/' . $id[0]);
    }
}