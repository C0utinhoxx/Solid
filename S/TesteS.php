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

//teste 2

namespace App;

use Illuminate\Support\Facades\Mail;

class OrderProcessor
{
    public function processOrder($orderId, $amount, $email)
    {
        // Lógica de pagamento
        echo "Processando pagamento de R$ $amount para pedido $orderId...\n";

        // Atualização de status do pedido
        echo "Pedido $orderId marcado como pago.\n";

        // Envio de e-mail
        Mail::raw("Seu pedido $orderId foi confirmado!", function ($message) use ($email) {
            $message->to($email)->subject('Pedido Confirmado');
        });
    }
}


//teste3

namespace App;

use Illuminate\Support\Facades\Log;

class ProductManager
{
    public function updateStock($productId, $quantity)
    {
        // Atualiza estoque
        echo "Produto $productId atualizado com $quantity unidades.\n";

        // Verifica alerta
        if ($quantity < 5) {
            echo "Alerta: estoque do produto $productId está baixo!\n";
        }

        // Log
        Log::info("Estoque do produto $productId atualizado para $quantity unidades");
    }
}
