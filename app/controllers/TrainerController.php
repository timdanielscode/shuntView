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

        $this->_data['encounters'] = DB::try()->select("encounters")->from("pokemon")->where("id", "=", $request["pokemonId"][0])->and("gameId", "=", $request["gameId"])->first();

        if(empty($request['pokemonId']) === true) {

            $request['pokemonId'] = DB::try()->select("id")->from("pokemon")->order("created_at")->first()[0];
        }

        Session::set("pokemonId", $request['pokemonId']);
        Session::set("gameId", $request['gameId']);

        
        return $this->view("trainer/index")->data($this->_data);
    }

    public function update($request) {

        DB::try()->update('pokemon')->set([

            'encounters' => $request['encounters']
        
        ])->where('id', '=', $request['pokemonId'])->and('gameId', '=', Session::get('gameId'))->run();

        redirect('/trainer/' . $request['id']);
    }
}