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

        if(empty($request['pokemonId']) === true) {

            $this->_data['pokemonId'] = DB::try()->select("id")->from("pokemon")->order("updated_at")->desc()->first()[0];
            $this->_data['gameId'] = DB::try()->select("encounters")->from("pokemon")->order("updated_at")->desc()->first()[0];
            $this->_data['encounters'] = DB::try()->select("encounters")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            $this->_data['pokemonId'] = $request['pokemonId'][0];
            $this->_data['encounters'] = DB::try()->select("encounters")->from("pokemon")->where("id", "=", $request["pokemonId"][0])->and("gameId", "=", $request["gameId"])->first()[0];
            $this->_data['gameId'] = DB::try()->select("gameId")->from("pokemon")->where("id", "=", $request["pokemonId"][0])->and("gameId", "=", $request["gameId"])->first()[0];
        }

        return $this->view("trainer/index")->data($this->_data);
    }

    public function update($request) {

        DB::try()->update('pokemon')->set([

            'encounters' => $request['encounters'],
            'updated_at' => date("Y-m-d H:i:s")
        
        ])->where('id', '=', $request['pokemonId'])->and('gameId', '=', Session::get('gameId'))->run();

        redirect('/trainer/' . $request['id']);
    }
}