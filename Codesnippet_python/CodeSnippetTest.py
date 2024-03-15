import Adyen
import unittest

adyen = Adyen.Adyen()

adyen.payment.client.xapikey = "YOUR_API_KEY"
adyen.payment.client.platform = "test"  # Change the value to live for the live environment.


class SnippetTest(unittest.TestCase):
    adyen = Adyen.Adyen()

    client = adyen.client
    client.xapikey = "YOUR_API_KEY"
    client.platform = "test"

    def test_sessions_success(self):
        request = {'amount': {"value": "1000", "currency": "EUR"}, 'reference': "YOUR_PAYMENT_REFERENCE",
                   'merchantAccount': "YOUR_MERCHANT_ACCOUNT",
                   'returnUrl': "https://your-company.com/checkout?shopperOrder=12xy..", 'countryCode': "NL"}

        result = self.adyen.checkout.payments_api.sessions(request)
        print(result.message)
