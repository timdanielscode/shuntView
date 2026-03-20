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
        $this->_data['pokemon'] = DB::try()->select("id")->from("pokemon")->fetch();

        if(empty($request['pokemonId']) === true) {

            $request['pokemonId'] = DB::try()->select("id")->from("pokemon")->order("created_at")->first()[0];
        }

        Session::set("pokemonId", $request['pokemonId']);
        
        return $this->view("trainer/index")->data($this->_data);
    }
}