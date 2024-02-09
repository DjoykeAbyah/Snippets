// import the required class
import {CheckoutAPI} from "../../services";
import Client from "../../client";
import { checkout } from "../../typings";

//setup client and service
const client = new Client({ apiKey: "YOUR_API_KEY", environment: "TEST" });
const checkoutApi = new CheckoutAPI(client);
const requestOptions = { idempotencyKey: "YOUR_IDEMPOTENCY_KEY" };

//create session request
checkoutApi.PaymentsApi.sessions({
    merchantAccount: 'YOUR_MERCHANT_ACCOUNT',
    amount: { currency: "EUR", value: 1000 },
    returnUrl: "https://your-company.com/checkout?shopperOrder=12xy..",
    reference: "YOUR_PAYMENT_REFERENCE",
    countryCode: "NL",
    channel: checkout.PaymentSetupRequest.ChannelEnum.Web,
})
    .then((response) => {
        console.log(response);
    })
    .catch((e) => {
        console.log(e);
    })