<?php

namespace app\models;

class Api {

    public function getName($id) {

        $url = "https://pokeapi.co/api/v2/pokemon/$id";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['name'];
    }
}