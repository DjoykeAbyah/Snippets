import Adyen

# Set up the client and service.
adyen = Adyen.Adyen()
adyen.client.xapikey = "YOUR_X-API-KEY"
adyen.client.platform = "test" # The environment to use library in.

# create session request
json_request = {
  "merchantAccount": "YOUR_MERCHANT_ACCOUNT",
  "amount": {
      "value": 1000,
      "currency": "EUR"
  },
  "returnUrl": "https://your-company.com/checkout?shopperOrder=12xy..",
  "reference": "YOUR_PAYMENT_REFERENCE",
  "countryCode": "NL"
}

result = adyen.checkout.payments_api.sessions(request=json_request, idempotency_key="YOUR_UUID_STRING")