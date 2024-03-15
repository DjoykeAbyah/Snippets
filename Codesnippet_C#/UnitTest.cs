using Microsoft.VisualStudio.TestTools.UnitTesting;
using Adyen.Model.Checkout;
using Adyen.Service.Checkout;
using Adyen.Model;
using Serilog;
using Serilog.Events;

namespace Adyen.Test
{
    [TestClass]
    public class SnippetTest
    {
        [TestMethod]
        public void TestCreateCheckoutSession()
        {
            // Set up the client and service.
            var config = new Config
            {
                XApiKey = "YOUR_API_KEY",
                Environment = Environment.Test
            };
            var client = new Client(config);
            var checkout = new PaymentsService(client);

            // Include your idempotency key when you make an API request.
            var requestOptions = new RequestOptions { IdempotencyKey = "YOUR_IDEMPOTENCY_KEY" };

            var checkoutSessionRequest = new CreateCheckoutSessionRequest(
                merchantAccount: "YOUR_MERCHANT_ACCOUNT",
                amount: new Amount("EUR", 1000L),
                returnUrl: "https://your-company.com/checkout?shopperOrder=12xy..",
                reference: "YOUR_PAYMENT_REFERENCE",
                countryCode: "NL");

            // Perform the API request.
            var createCheckoutSessionResponse = checkout.Sessions(checkoutSessionRequest, requestOptions);

            Assert.AreEqual("EUR", createCheckoutSessionResponse.Amount.Currency);
            Assert.IsNotNull(createCheckoutSessionResponse);
            Assert.IsNotNull(createCheckoutSessionResponse.Id);
            Assert.IsNotNull(createCheckoutSessionResponse.SessionData);
        }
    }
}