<?php

namespace Source\App\Api;

use Source\Models\User;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read (array $data) : void
    {
        $response = [
            "success" => [
                "code" => 200,
                "type" => "accepted",
                "message" => "Dados do usuário"
            ],
            "user" => [
                /*"name" => $this->user->getName(),
                "email" => $this->user->getEmail(),
                "token" => $this->token*/
            ]
        ];
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
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
                "success" => [
                              "code" => 200,
                              "type" => "accepted",
                              "message" => $user->getMessage()
                ],
                "user" => [
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

        $user = new User();

        if(!$user->auth($data["email"],$data["password"])){
            $response = [
                "error" => [
                    "code" => 401,
                    "type" => "invalid_data",
                    "message" => $user->getMessage()
                ]
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $response = [
            "success" => [
                "code" => 200,
                "type" => "accepted",
                "message" => "Usuário autenticado corretamente..."
            ]
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function testToken (array $data) : void
    {

    }
}
