<?php

namespace Adyen\Service\Checkout;

use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Service\Checkout\PaymentsApi;

// Include your idempotency key when you make an API request.
$requestOptions['idempotencyKey'] = "YOUR_IDEMPOTENCY_KEY";

// Set up the client and service.
$client = new \Adyen\Client();

//has issue with $Bk in API key use single quotes?
$client->setXApiKey('YOUR_API_KEY');
$client->setEnvironment(\Adyen\Environment::TEST);

$service = new PaymentsApi($client);

// Creating Amount Object
$amount = new Amount();
$amount
    ->setValue(1500)
    ->setCurrency("EUR");

// Create the actual Request
$sessionRequest = new CreateCheckoutSessionRequest();
$sessionRequest
    ->setMerchantAccount("YOUR_MERCHANT_ACCOUNT")
    ->setAmount($amount)
    ->setReference("payment-test")
    ->setReturnUrl("https://your-company.com/...");


$sessionRequest->jsonSerialize();//to json
$result = $service->sessions($sessionRequest);