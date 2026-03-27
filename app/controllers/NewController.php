<?php

namespace app\controllers;

use app\models\Api;
use app\models\Pokemon;
use core\Session;
use validation\Rules;

class NewController extends Controller {

    private $_data = [];

    public function index($request) {

        $this->_data[] = $this->getData($request);

        return $this->view("new/index")->data($this->_data);
    }

    private function getData($request) {

        if(!empty($request['pokemonId']) === true) {

            $api = new Api();
            $pokemonName = $api->getName($request['pokemonId']);

            Session::set('pokemonName', $pokemonName);

            $this->_data['pokemonId'] = $request['pokemonId'];

            return $this->_data;
        }
    }

    private function getHandheldId($request) {

        if(empty($request['handheldId'])) {

            return "";
        } else {

            return $request['handheldId'];
        }
    }

    private function getGameId($request) {

        if(empty($request['gameId'])) {

            return "";
        } else {

            return $request['gameId'];
        }
    }

    public function store($request) {

        $rules = new Rules();
  
        if($rules->handheldIdAndGameId($this->getHandheldId($request), $this->getGameId($request))->validated()) {

            $id = explode('?', $request['id']);

            Pokemon::insert([
                
                'pokemonId' => $request['pokemonId'],
                'name' => Session::get('pokemonName'),
                'encounters' => 0,
                'hp' => 0,
                'def' => 0,
                'att' => 0,
                'spd' => 0,
                'spa' => 0,
                'spe' => 0,
                'shiny' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'gameId' => $request['gameId'],
                'handheldId' => $request['handheldId'],
                'userId' => $id[0]
            ]);

            redirect('/trainer/' . $id[0]);
        } else {

            $this->_data[] = $this->getData($request);
            $this->_data['rules'] = $rules->errors;

            return $this->view("new/index")->data($this->_data);
        }
    }
}