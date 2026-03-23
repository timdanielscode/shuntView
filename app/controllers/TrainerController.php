<?php

namespace app\controllers;

use app\models\Api;
use app\models\Pokemon;
use core\Session;
use database\DB;

class TrainerController extends Controller {

    private $_data = [];

    public function index($request) {

        $this->_data['id'] = explode('?', $request['id']);
        $this->_data['pokemon'] = DB::try()->select("id", "gameId")->from("pokemon")->fetch();

        if(!empty($this->_data['pokemon']) === true) {

            $this->_data['pokemonId'] = Pokemon::getPokemonId($request);
            $this->_data['gameId'] = Pokemon::getGameId($request);
            $this->_data['encounters'] = Pokemon::getEncounters($request);
        }

        return $this->view("trainer/index")->data($this->_data);
    }

    public function update($request) {

        DB::try()->update('pokemon')->set([

            'encounters' => $request['encounters'],
            'updated_at' => date("Y-m-d H:i:s")
        
        ])->where('id', '=', $request['pokemonId'])->and('gameId', '=', $request['gameId'])->run();

        redirect('/trainer/' . $request['id']);
    }
}