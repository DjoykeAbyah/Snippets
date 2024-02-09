<?php

// Include your idempotency key when you make an API request.
$requestOptions['idempotencyKey'] = "YOUR_IDEMPOTENCY_KEY";

// Set up the client and service.
$client = new \Adyen\Client();
$client->setXApiKey('YOUR_API_KEY');
$client->setEnvironment(\Adyen\Environment::TEST);
$client->setApplicationName('Test Application');
$client->setTimeout(30);

$service = new PaymentsApi($client);

// Creating Amount Object
$amount = new Amount();
$amount
    ->setValue(1500)
    ->setCurrency("EUR");

// Create Request
$sessionRequest = new CreateCheckoutSessionRequest();
$sessionRequest
    ->setMerchantAccount("YOUR_MERCHANT_ACCOUNT")
    ->setAmount($amount)
    ->setReference("payment-test")
    ->setReturnUrl("https://your-company.com/...");

$result = $service->sessions($sessionRequest);
