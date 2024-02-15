<?php

use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Service\Checkout\PaymentsApi;

// Include your idempotency key when you make an API request.
$requestOptions['idempotencyKey'] = "YOUR_IDEMPOTENCY_KEY";

// Set up the client and service.
$client = new \Adyen\Client();
$client->setXApiKey('YOUR_API_KEY');
$client->setEnvironment(\Adyen\Environment::TEST);
$client->setApplicationName('Test Application');//need this?
$client->setTimeout(30);//need this?

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
    ->setReference("YOUR_PAYMENT_REFERENCE")
    ->setReturnUrl("https://your-company.com/...");
    ->setCountryCode("NL");

$result = $service->sessions($sessionRequest);
