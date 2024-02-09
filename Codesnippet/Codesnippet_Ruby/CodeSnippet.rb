require "adyen-ruby-api-library"

adyen = Adyen::Client.new
adyen.api_key = 'AF5XXXXXXXXXXXXXXXXXXXX'
adyen.env = :test # Set to "live" for live environment

request_body = {
  :merchantAccount => 'YOUR_MERCHANT_ACCOUNT',
  :amount => {
      :value => 1000,
      :currency => 'EUR'
  },
  :returnUrl => 'https://your-company.com/checkout?shopperOrder=12xy..',
  :reference => 'YOUR_PAYMENT_REFERENCE',
  :countryCode => 'NL'
}

result = adyen.checkout.payments_api.sessions(request_body, headers: { 'Idempotency-Key' => 'UUID' })