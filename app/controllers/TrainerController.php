<?php

namespace app\controllers;

use app\models\Pokemon;
use core\Session;
use database\DB;
use validation\Rules;

class TrainerController extends Controller {

    private $_data = [];

    public function index($request) {

        $this->_data['userId'] = explode('?', $request['id']);
        $this->_data['pokemon'] = Pokemon::getAll();

        $this->_data[] = $this->getData($request);

        $this->_data['rules'] = [];

        return $this->view("trainer/index")->data($this->_data);
    }

    private function getData($request) {

        if(!empty($this->_data['pokemon']) === true) {

            $this->_data['id'] = Pokemon::getId($request);
            $this->_data['pokemonId'] = Pokemon::getPokemonId($request);
            $this->_data['pokemonName'] = Pokemon::getName($request);
            $this->_data['gameId'] = Pokemon::getGameId($request);
            $this->_data['encounters'] = Pokemon::getEncounters($request);
            $this->_data['hp'] = Pokemon::getHp($request);
            $this->_data['def'] = Pokemon::getDef($request);
            $this->_data['att'] = Pokemon::getAtt($request);
            $this->_data['spd'] = Pokemon::getSpd($request);
            $this->_data['spa'] = Pokemon::getSpa($request);
            $this->_data['spe'] = Pokemon::getSpe($request);
            $this->_data['shiny'] = Pokemon::getShinyStatus($request);
            $this->_data['game'] = Pokemon::getGame($request);
            $this->_data['handheld'] = Pokemon::getHandHeld($request);
            $this->_data['startedShuntDate'] = Pokemon::getStartedShuntDate($request);
            $this->_data['lastShuntDate'] = Pokemon::getLastShuntDate($request);
        }

        return $this->_data;
    }

    public function update($request) {

        $this->updateData($request);
        $this->updateShinyStatus($request);
    }

    private function updateData($request) {

        if(isset($_POST['save']) === true) {

            Pokemon::updateEncounters($request['encounters'], $request['ID']);

            Pokemon::updateHp($request['hp'], $request['ID']);
            Pokemon::updateDef($request);
            Pokemon::updateAtt($request);
            Pokemon::updateSpd($request);
            Pokemon::updateSpa($request);
            Pokemon::updateSpe($request);

            redirect('/trainer/' . $request['id']);
        }
    }

    private function updateShinyStatus($request) {

        if(isset($_POST['shiny']) === true) {

            $rules = new Rules();
            
            if($rules->shiny($request['hp'], $request['def'], $request['att'], $request['att'], $request['spd'], $request['spa'], $request['spe'])->validated()) {

                Pokemon::updateShinyStatus($request);

                redirect('/trainer/' . $request['id']);

            } else {

                $this->_data['userId'] = explode('?', $request['id']);
                $this->_data['pokemon'] = DB::try()->select("id", "pokemonId", "gameId", "shiny", "hp", "def", "att", "spd", "spa", "spe")->from("pokemon")->order("updated_at")->desc()->fetch();

                $this->_data[] = $this->getData($request);
                $this->_data['rules'] = $rules->errors;
                
                return $this->view("trainer/index")->data($this->_data);
            }
        }
    } 

    public function delete($request) {

        Pokemon::delete("id", $request["ID"]);

        redirect('/trainer/' . $request['id']);
    }
}