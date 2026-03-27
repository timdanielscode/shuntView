<?php

namespace app\models;

use database\DB;

class Pokemon extends Model {

    public static function getAll() {

        return DB::try()->select("id", "pokemonId", "gameId", "shiny", "hp", "def", "att", "spd", "spa", "spe")->from("pokemon")->order("updated_at")->desc()->fetch();
    }

    public static function getName($request) {

        $api = new Api();
        
        if(empty($request['pokemonId']) === true) {

            $id = DB::try()->select("pokemonId")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            $id = $request['pokemonId'];
        }

        return $api->getName($id);
    }

    public static function getId($request) {

        if(empty($request['pokemonId']) === true) {


            return DB::try()->select("id")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return $request['ID'];
        }
    }

    public static function getPokemonId($request) {

        if(empty($request['pokemonId']) === true) {


            return DB::try()->select("pokemonId")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return $request['pokemonId'];
        }
    }

    public static function getGameId($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("gameId")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return DB::try()->select("gameId")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getShinyStatus($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("shiny")->from("pokemon")->order("updated_at")->desc()->first()[0];
        } else {

            return DB::try()->select("shiny")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getEncounters($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("encounters")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("encounters")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getHp($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("hp")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("hp")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getDef($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("def")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("def")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getAtt($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("att")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("att")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getSpd($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("spd")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("spd")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getSpa($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("spa")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("spa")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getSpe($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("spe")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("spe")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getStartedShuntDate($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("created_at")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("created_at")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getLastShuntDate($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("updated_at")->from("pokemon")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("updated_at")->from("pokemon")->where("id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getGame($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("games.name")->from("games")->join("pokemon")->on("games.id", "=", "pokemon.gameId")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("games.name")->from("games")->join("pokemon")->on("games.id", "=", "pokemon.gameId")->where("pokemon.id", "=", $request["ID"])->first()[0];
        }
    }

    public static function getHandheld($request) {

        if(empty($request['pokemonId']) === true) {

            return DB::try()->select("handhelds.name")->from("handhelds")->join("pokemon")->on("handhelds.id", "=", "pokemon.handheldId")->order("updated_at")->desc()->first()[0];

        } else {

            return DB::try()->select("handhelds.name")->from("handhelds")->join("pokemon")->on("handhelds.id", "=", "pokemon.handheldId")->where("pokemon.id", "=", $request["ID"])->first()[0];
        }
    }

    public static function updateEncounters($encounters, $ID) {

        DB::try()->update('pokemon')->set([

            'encounters' => $encounters,
            'updated_at' => date("Y-m-d H:i:s")
        
        ])->where('id', "=", $ID)->run();
    }

    public static function updateHp($hp, $ID) {

        DB::try()->update('pokemon')->set([

            'hp' => $hp
            
        ])->where('id', "=", $ID)->run();
    }

    public static function updateDef($def, $ID) {

        DB::try()->update('pokemon')->set([

            'def' => $def
            
        ])->where('id', "=", $ID)->run();
    }

    public static function updateAtt($att, $ID) {

        DB::try()->update('pokemon')->set([

            'att' => $att
            
        ])->where('id', "=", $ID)->run();
    }

    public static function updateSpd($spd, $ID) {

        DB::try()->update('pokemon')->set([

            'spd' => $spd
            
        ])->where('id', "=", $ID)->run();
    }

    public static function updateSpa($spa, $ID) {

        DB::try()->update('pokemon')->set([

            'spa' => $spa
            
        ])->where('id', "=", $ID)->run();
    }

    public static function updateSpe($spe, $ID) {

        DB::try()->update('pokemon')->set([

            'spe' => $spe
            
        ])->where('id', "=", $ID)->run();
    }

    public static function updateShinyStatus($request) {

        DB::try()->update('pokemon')->set([

            'shiny' => Pokemon::checkGetShinyStatus($request),
            'updated_at' => date("Y-m-d H:i:s")
        
        ])->where('id', "=", $request['ID'])->run();
    }

    private static function checkGetShinyStatus($request) {

        if(self::getShinyStatus($request) === 1) {

            $status = 0;


        } else if(self::getShinyStatus($request) === 0) {

            $status = 1;
        }

        return $status;
    }
}