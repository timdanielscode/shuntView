<?php

namespace app\controllers;

use app\models\Api;
use app\models\Pokemon;
use core\Session;

class NewController extends Controller {

    private $_data = [];

    public function index($request) {

        $api = new Api();
        $pokemonName = $api->getName($request['pokemonId']);

        Session::set("pokemonId", $request['pokemonId']);
        Session::set("pokemonName", $pokemonName);

        return $this->view("new/index")->data();
    }

    public function store($request) {

        $id = explode('?', $request['id']);

        Pokemon::insert([
            
            'id' => Session::get('pokemonId'),
            'name' => Session::get("pokemonName"),
            'encounters' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'gameId' => $request['gameId'],
            'userId' => $id[0]
        ]);

        Session::set('success', 'You have successfully added a new shunt!');

        redirect('/trainer/' . $id[0]);
    }
}