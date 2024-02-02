// import the required class
import {CheckoutAPI} from "../../services";
import Client from "../../client";
import { checkout } from "../../typings";

//setup client and service
const client = new Client({ apiKey: "YOUR_API_KEY", environment: "TEST" });
const checkoutApi = new CheckoutAPI(client);
// const requestOptions = { idempotencyKey: "YOUR_IDEMPOTENCY_KEY" };//never read, when would I need this


//create session request
checkoutApi.PaymentsApi.sessions({
    amount: { currency: "EUR", value: 1000 },
    reference: "YOUR_PAYMENT_REFERENCE",
    returnUrl: "https://your-company.com/checkout?shopperOrder=12xy..",
    merchantAccount: 'YOUR_MERCHANT_ACCOUNT',
    countryCode: "NL",
    channel: checkout.PaymentSetupRequest.ChannelEnum.Web,
})
    .then((response) => {
        console.log(response);
    })
    .catch((e) => {
        console.log(e);
    })