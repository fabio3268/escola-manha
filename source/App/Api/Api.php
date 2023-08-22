<?php

namespace Source\App\Api;

use Firebase\JWT\JWT;
use Source\Core\TokenJWT;
use Source\Models\User;

class Api
{
    /** @var \Source\Models\User|null */
    protected $user;
    protected $headers;
    protected $token;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');

        $this->headers = getallheaders();

        if(isset($this->headers["email"], $this->headers["password"])){

            $this->user = new User();

            if(!$this->user->auth($this->headers["email"],$this->headers["password"])){
                echo json_encode([
                    "error" => [
                        "code" => 401,
                        "type" => "unauthorized",
                        "message" => "Email e/ou senha inválidos"
                    ]
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $this->token = (new TokenJWT())->create([
                'idUser' => $this->user->getId(),
                'userEmail' => $this->user->getEmail(),
                'userType' => 'User'
            ]);

        }

        if (isset($this->headers["token"])){
            $token = new TokenJWT();
            if(!$token->verify($this->headers["token"])){
                echo json_encode([
                    "error" => [
                        "code" => 401,
                        "type" => "unauthorized",
                        "message" => "Token inválido"
                    ]
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $this->user = (new User())->findById($token->token->data->idUser);
            $this->user->setPassword(NULL);
            //var_dump($this->user);
        }
    }

}
