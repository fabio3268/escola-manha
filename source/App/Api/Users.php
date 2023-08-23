<?php

namespace Source\App\Api;

use Source\Models\Address;
use Source\Models\User;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create (array $data) : void
    {

       if(!empty($data)){
            $user = new User($data["name"],$data["email"],$data["password"]);
            if(!$user->insert()){
                $response = [
                    "error" => [
                        "code" => 400,
                        "type" => "invalid_data",
                        "message" => $user->getMessage()
                    ]
                ];
                $this->back($response,400);
                return;
            }

            $response = [
                "user" => [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                ]
            ];

            $this->back($response,201);
        }
    }

    public function login (array $data) : void
    {

        if(!empty($this->token)){
            $response = [
                "user" => [
                    "id" => $this->user->getId(),
                    "name" => $this->user->getName(),
                    "email" => $this->user->getEmail(),
                    "token" => $this->token
            ]
            ];
            $this->back($response,200);
        }

    }

    public function listAdresses (array $data): void
    {

        if($this->user){
            $adresses = new Address();
            $this->back($adresses->selectByIdUser($this->user->getId()),200);
        }

    }

}
