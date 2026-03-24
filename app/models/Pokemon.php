<?php

namespace app\models;

use database\DB;

class Pokemon extends Model {

    public static function getPokemonId($request) {

        if(empty($request['pokemonId']) === true) {


            return DB::try()->select("id")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return $request['pokemonId'];
        }
    }

    public static function getGameId($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("gameId")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return DB::try()->select("gameId")->from("pokemon")->where("id", "=", $request["pokemonId"])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function getShinyStatus($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("shiny")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return DB::try()->select("shiny")->from("pokemon")->where("id", "=", $request["pokemonId"])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function getEncounters($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("encounters")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("encounters")->from("pokemon")->where("id", "=", $request["pokemonId"])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function getStartedShuntDate($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("created_at")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("created_at")->from("pokemon")->where("id", "=", $request["pokemonId"])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function getLastShuntDate($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("updated_at")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("updated_at")->from("pokemon")->where("id", "=", $request["pokemonId"])->and("gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function getGame($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("games.name")->from("games")->join("pokemon")->on("games.id", "=", "pokemon.gameId")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("games.name")->from("games")->join("pokemon")->on("games.id", "=", "pokemon.gameId")->where("pokemon.id", "=", $request["pokemonId"])->and("pokemon.gameId", "=", $request["gameId"])->first()[0];
        }
    }

    public static function updateEncounters($request) {

        DB::try()->update('pokemon')->set([

            'encounters' => $request['encounters'],
            'updated_at' => date("Y-m-d H:i:s")
        
        ])->where('id', '=', $request['pokemonId'])->and('gameId', '=', $request['gameId'])->run();
    }

    public static function updateShinyStatus($request) {

        DB::try()->update('pokemon')->set([

            'shiny' => Pokemon::checkGetShinyStatus($request),
            'updated_at' => date("Y-m-d H:i:s")
        
        ])->where('id', '=', $request['pokemonId'])->and('gameId', '=', $request['gameId'])->run();
    }

    private static function checkGetShinyStatus($request) {

        if(Pokemon::getShinyStatus($request) === 1) {

            $status = 0;


        } else if(Pokemon::getShinyStatus($request) === 0) {

            $status = 1;
        }

        return $status;
    }
}