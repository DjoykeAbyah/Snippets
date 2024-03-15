//import the required class
package com.adyen;

import com.adyen.Client;
import com.adyen.service.checkout.PaymentsApi;
import com.adyen.model.checkout.Amount;
import com.adyen.model.checkout.CreateCheckoutSessionRequest;
import com.adyen.model.checkout.CreateCheckoutSessionResponse;
import com.adyen.enums.Environment;
import org.junit.Test;

import static org.junit.Assert.assertNotNull;

public class SnippetTest extends BaseTest
{
    @Test
    public void SnippetTest() throws Exception
    {
        //Setup Client and Service
        Client client = new Client("YOUR_API_KEY", Environment.TEST);

        //create session request
        CreateCheckoutSessionRequest sessionRequest = new CreateCheckoutSessionRequest();
        PaymentsApi checkoutPaymentsApi = new PaymentsApi(client);
        Amount amount = new Amount().currency("EUR").value(1000L);
        sessionRequest.setAmount(amount);
        sessionRequest.setReturnUrl("https://your-company.com/checkout?shopperOrder=12xy...");
        sessionRequest.setMerchantAccount("YOUR_MERCHANT_ACCOUNT");
        sessionRequest.setReference("YOUR_PAYMENT_REFERENCE");
        sessionRequest.setCountryCode("NL");
        CreateCheckoutSessionResponse createCheckoutSessionResponse = checkoutPaymentsApi.sessions(sessionRequest);

        System.out.println("Create Checkout Session Response: " + createCheckoutSessionResponse);
        assertNotNull(createCheckoutSessionResponse);
    }
}