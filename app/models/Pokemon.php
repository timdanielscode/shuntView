<?php

namespace app\models;

use database\DB;

class Pokemon extends Model {

    public static function getPokemonId($request) {

        if(empty($request['pokemonId']) === true) {


            return DB::try()->select("id")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return $request['pokemonId'][0];
        }
    }

    public static function getGameId($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("gameId")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return DB::try()->select("gameId")->from("pokemon")->where("id", "=", $request["pokemonId"][0])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function getEncounters($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("encounters")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("encounters")->from("pokemon")->where("id", "=", $request["pokemonId"][0])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }
}