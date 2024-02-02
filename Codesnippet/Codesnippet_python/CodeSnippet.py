import Adyen

adyen = Adyen.Adyen()

client = adyen.client
adyen.payment.client.xapikey = "YOUR_API_KEY"
adyen.payment.client.platform = "test"  # Change the value to live for the live environment.
adyen.payment.client.app_name = "appname"


def test_sessions_success(self):
    request = {}
    request['amount'] = {"value": "1000", "currency": "EUR"}
    request['reference'] = "YOUR_PAYMENT_REFERENCE"
    request['merchantAccount'] = "YOUR_MERCHANT_ACCOUNT"
    request['returnUrl'] = "https://your-company.com/checkout?shopperOrder=12xy.."
    request['countryCode'] = "NL"

    result = self.adyen.checkout.payments_api.sessions(request)
    print(result.message)