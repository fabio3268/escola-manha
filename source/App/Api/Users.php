<?php

namespace Source\App\Api;

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
                http_response_code(400);
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "user" => [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                ]
            ];

            http_response_code(200);
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
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
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

    }

    public function listAdresses (array $data): void
    {
        var_dump($this->user);
    }

    public function testToken (array $data) : void
    {
        echo "Olá!";
    }
}
