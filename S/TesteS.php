<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserManager
{
    public function createUser($name, $email, $password)
    {
        // Regra de negócio + Persistência
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        // Envio de e-mail (Responsabilidade diferente)
        Mail::raw("Bem-vindo, $name!", function ($message) use ($email) {
            $message->to($email)
                    ->subject('Cadastro Realizado');
        });

        // Lógica de apresentação (Responsabilidade diferente ainda)
        echo "Usuário $name criado com sucesso e e-mail enviado para $email!";
    }
}
