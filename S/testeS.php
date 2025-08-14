<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserManager
{
    public function createUser($name, $email, $password)
    {
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
    }
}

class SendMail 
{ 
    public function sendWelcomeMail($name, $email)
    {  

        Mail::raw("Bem-vindo, $name!", function ($message) use ($email) {
            $message->to($email)
            ->subject('Cadastro Realizado');
        });
        
        echo "Usuário $name criado com sucesso e e-mail enviado para $email!";
    }
        
}
