//import the required class
package com.adyen.service;

import com.adyen.Client;
import com.adyen.service.checkout.PaymentsApi;
import com.adyen.model.checkout.Amount;
import com.adyen.model.checkout.CreateCheckoutSessionRequest;
import com.adyen.model.checkout.CreateCheckoutSessionResponse;
import com.adyen.enums.Environment;
import com.adyen.service.exception.ApiException;

import java.io.IOException;

public class Snippet {

    public Snippet() throws IOException, ApiException {
        //Setup Client and Service
        Client client = new Client("YOUR_API_KEY", Environment.TEST);

        Amount amount = new Amount().currency("EUR").value(1000L);
        //create session request
        CreateCheckoutSessionRequest createCheckoutSessionRequest = new CreateCheckoutSessionRequest()
                .amount(amount)
                .merchantAccount("YOUR_MERCHANT_ACCOUNT")
                .returnUrl("https://your-company.com/checkout?shopperOrder=12xy...")
                .reference("YOUR_PAYMENT_REFERENCE")
                .countryCode("NL");

        PaymentsApi checkoutPaymentsApi = new PaymentsApi(client);
        CreateCheckoutSessionResponse createCheckoutSessionResponse = checkoutPaymentsApi.sessions(createCheckoutSessionRequest);
    }
}
