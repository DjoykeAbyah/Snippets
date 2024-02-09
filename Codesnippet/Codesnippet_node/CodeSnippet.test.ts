//test imports
import nock from "nock";
import { SessionResultResponse } from "../typings/checkout/sessionResultResponse";

// import the required class
import {CheckoutAPI} from "../services";
import Client from "../client";
import { checkout } from "../typings";

//setup client and service
const client = new Client({ apiKey: "YOUR_API_KEY", environment: "TEST" });
const checkoutApi = new CheckoutAPI(client);
// const requestOptions = { idempotencyKey: "YOUR_IDEMPOTENCY_KEY" };???

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

// let client: Client;
let checkoutService: CheckoutAPI;
let scope: nock.Scope;

beforeEach((): void => {
    if (!nock.isActive()) {
        nock.activate();
    }
    // client = createClient();
    scope = nock("https://checkout-test.adyen.com/v71");
    checkoutService = new CheckoutAPI(client);
});

afterEach(() => {
    nock.cleanAll();
});

    test("Should create basic payment", async(): Promise<void> => 
    {
        scope.get("/sessions/mySessionIdMock?sessionResult=sessionResult")
        .reply(200, {
            "id": "CS12345678",
            "status": "completed"
        });

        const resultOfPaymentSessionResponse = await checkoutService.PaymentsApi.getResultOfPaymentSession("mySessionIdMock", "sessionResult");
        expect(resultOfPaymentSessionResponse.id).toEqual("CS12345678");
        expect(resultOfPaymentSessionResponse.status).toEqual(SessionResultResponse.StatusEnum.Completed);
    });
