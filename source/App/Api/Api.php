<?php

namespace Source\App\Api;

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

/*        if(isset($this->headers["email"], $this->headers["password"])){

            $this->user = new User();

            if(!$this->user->auth($this->headers["email"],$this->headers["password"])){
                echo "não autenticou";
                return;
            }

            $this->token = (new TokenJWT())->create([
                'idUser' => 23,
                'userIdentification' => "Email",
                'userType' => 'User'
            ]);

        }*/
    }

}
