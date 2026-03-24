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
        $this->_data['pokemon'] = DB::try()->select("id", "gameId", "shiny")->from("pokemon")->order("updated_at")->desc()->fetch();

        if(!empty($this->_data['pokemon']) === true) {

            $this->_data['pokemonId'] = Pokemon::getPokemonId($request);
            $this->_data['gameId'] = Pokemon::getGameId($request);
            $this->_data['encounters'] = Pokemon::getEncounters($request);
            $this->_data['shiny'] = Pokemon::getShinyStatus($request);
            $this->_data['game'] = Pokemon::getGame($request);
            $this->_data['startedShuntDate'] = Pokemon::getStartedShuntDate($request);
            $this->_data['lastShuntDate'] = Pokemon::getLastShuntDate($request);
        }

        return $this->view("trainer/index")->data($this->_data);
    }

    public function update($request) {

        if(isset($_POST['save']) === true) {

            Pokemon::updateEncounters($request);

        } else if(isset($_POST['shiny']) === true) {

            Pokemon::updateShinyStatus($request);
        }

        redirect('/trainer/' . $request['id']);
    }
}