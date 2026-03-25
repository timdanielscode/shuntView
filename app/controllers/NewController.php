<?php

namespace app\controllers;

use app\models\Api;
use app\models\Pokemon;
use core\Session;

class NewController extends Controller {

    private $_data = [];

    public function index($request) {

        if(!empty($request['pokemonId']) === true) {

            $api = new Api();
            $pokemonName = $api->getName($request['pokemonId']);

            Session::set('pokemonName', $pokemonName);

            $this->_data['pokemonId'] = $request['pokemonId'];
        }

        return $this->view("new/index")->data($this->_data);
    }

    public function store($request) {

        $id = explode('?', $request['id']);

        Pokemon::insert([
            
            'id' => $request['pokemonId'],
            'name' => Session::get('pokemonName'),
            'encounters' => 0,
            'shiny' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'gameId' => $request['gameId'],
            'handheldId' => $request['handheldId'],
            'userId' => $id[0]
        ]);

        redirect('/trainer/' . $id[0]);
    }
}