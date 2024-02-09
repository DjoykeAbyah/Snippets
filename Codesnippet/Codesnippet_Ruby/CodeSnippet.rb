require "adyen-ruby-api-library"

# Set up the client and service.
adyen = Adyen::Client.new
adyen.api_key = 'YOUR_API_KEY'
adyen.env = :test # Set to "live" for live environment

# create session request
request_body = {
  :amount => {
    :value => 1000,
    :currency => 'EUR'
  },
  :merchantAccount => 'YOUR_MERCHANT_ACCOUNT',
  :returnUrl => 'https://your-company.com/checkout?shopperOrder=12xy..',
  :reference => 'YOUR_PAYMENT_REFERENCE',
  :countryCode => 'NL'
}

result = adyen.checkout.payments_api.sessions(request_body, headers: { 'Idempotency-Key' => 'UUID' })