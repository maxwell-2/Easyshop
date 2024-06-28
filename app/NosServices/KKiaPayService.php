<?php

namespace App\NosServices;

use GuzzleHttp\Client;

class KKiaPayService
{
    protected $client;
    protected $publicKey;
    protected $privateKey;
    protected $secret;

    public function __construct()
    {    

         $this->client = new Client([
            'verify' => storage_path('storage\cacert.pem') // Chemin vers votre fichier cacert.pem
        ]);
        $this->client = new Client();
        $this->publicKey = config('services.kkiapay.public_key');
        $this->privateKey = config('services.kkiapay.private_key');
        $this->secret = config('services.kkiapay.secret');
    }

    public function createPayment($amount, $email, $description)
    {
        $response = $this->client->post('https://api.kkiapay.me/api/v1/transactions/init', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->privateKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'amount' => $amount,
                'email' => $email,
                'description' => $description,
                'public_key' => $this->publicKey,
                'callback' => route('payment.callback'),
                'return_url' => route('payment.success'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
