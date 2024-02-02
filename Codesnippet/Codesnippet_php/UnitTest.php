<?php

namespace Adyen\Tests\Unit;

use Adyen\AdyenException;
use Adyen\Model\Checkout\Amount;
use Adyen\Model\Checkout\CreateCheckoutSessionRequest;
use Adyen\Service\Checkout\PaymentsApi;
use PHPUnit\Framework\TestCase;

class SnippetTest extends TestCase
{
    public function testSnippetSuccess()
    {
        // Set up the client and service.
        $client = new \Adyen\Client();

        //has issue with $Bk in API key use single quotes?
        $client->setXApiKey('AQEshmfxLI3HbhJLw0m/n3Q5qf3VeIdYCppEfGBbyawB/isehnLWag91Hdz+6UkQwV1bDb7kfNy1WIxIIkxgBw==-Kphz51iO9Nk6tKXEw5F2OYFfs0dGnzgbHLHq54YFcak=-9+yyk%f:@K$Bk=c;');
        $client->setEnvironment(\Adyen\Environment::TEST);
        $client->setApplicationName('Test Application');
        $client->setTimeout(30);

        $service = new PaymentsApi($client);
        
        // Creating Amount Object
        $amount = new Amount();
        $amount
            ->setValue(1500)
            ->setCurrency("EUR");

        // Create the actual Request
        $sessionRequest = new CreateCheckoutSessionRequest();
        $sessionRequest
            ->setMerchantAccount("PluginDemo_Djoyke_TEST")
            ->setAmount($amount)
            ->setReference("payment-test")
            ->setReturnUrl("https://your-company.com/...");
        
        $result = $service->sessions($sessionRequest);
        // Assert that the result is not null
        $this->assertNotNull($result);
    }
}