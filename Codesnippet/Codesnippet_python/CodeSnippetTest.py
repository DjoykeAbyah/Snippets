import Adyen
import unittest

adyen = Adyen.Adyen()

adyen.payment.client.xapikey = "YOUR_API_KEY"
adyen.payment.client.platform = "test"  # Change the value to live for the live environment.


class SnippetTest(unittest.TestCase):
    adyen = Adyen.Adyen()

    client = adyen.client
    client.xapikey = f'AQEshmfxLI3HbhJLw0m/n3Q5qf3VeIdYCppEfGBbyawB/isehnLWag91Hdz+6UkQwV1bDb7kfNy1WIxIIkxgBw==-Kphz51iO9Nk6tKXEw5F2OYFfs0dGnzgbHLHq54YFcak=-9+yyk%f:@K$Bk=c;
    client.platform = "test"

    def test_sessions_success(self):
        request = {'amount': {"value": "1000", "currency": "EUR"}, 'reference': "YOUR_PAYMENT_REFERENCE",
                   'merchantAccount': "YOUR_MERCHANT_ACCOUNT",
                   'returnUrl': "https://your-company.com/checkout?shopperOrder=12xy..", 'countryCode': "NL"}

        result = self.adyen.checkout.payments_api.sessions(request)
        print(result.message)
