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



//teste2
namespace App;

use Illuminate\Support\Facades\Mail;

class OrderProcessor
{
    public function processOrder($orderId, $amount)
    {
        echo "Processando pagamento de R$ $amount para pedido $orderId...\n";
         }
    public function pedido  ($orderId) {
        echo "Pedido $orderId marcado como pago.\n";
    }
 
    public function SendMail($message, $email) {
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
        echo "Produto $productId atualizado com $quantity unidades.\n";
    }
    public function veryAlart($quantity, $productId){
        if ($quantity < 5) {
            echo "Alerta: estoque do produto $productId está baixo!\n";
        }
     }
     public function Log($productId, $quantity){
        Log::info("Estoque do produto $productId atualizado para $quantity unidades");
    }
}
