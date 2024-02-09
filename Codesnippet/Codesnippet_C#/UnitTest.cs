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
                XApiKey = "AQEshmfxLI3HbhJLw0m/n3Q5qf3VeIdYCppEfGBbyawB/isehnLWag91Hdz+6UkQwV1bDb7kfNy1WIxIIkxgBw==-Kphz51iO9Nk6tKXEw5F2OYFfs0dGnzgbHLHq54YFcak=-9+yyk%f:@K$Bk=c;",
                Environment = Environment.Test
            };
            var client = new Client(config);
            var checkout = new PaymentsService(client);

            // Include your idempotency key when you make an API request.
            var requestOptions = new RequestOptions { IdempotencyKey = "YOUR_IDEMPOTENCY_KEY" };

            var checkoutSessionRequest = new CreateCheckoutSessionRequest(
                merchantAccount: "PluginDemo_Djoyke_TEST",
                reference: "YOUR_PAYMENT_REFERENCE",
                returnUrl: "https://your-company.com/checkout?shopperOrder=12xy..",
                amount: new Amount("EUR", 1000L),
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