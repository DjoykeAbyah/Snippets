require 'json'
require 'adyen-ruby-api-library'

client = Adyen::Client.new
client.api_key = 'YOUR_API_KEY'
client.env = :test # Set to "live" for live environment

request_body = {
    merchantAccount: 'YOUR_MERCHANT_ACCOUNT',
    amount: {
    value: 1000,
    currency: 'EUR'
    },
    returnUrl: 'https://your-company.com/checkout?shopperOrder=12xy..',
    reference: 'YOUR_PAYMENT_REFERENCE',
    countryCode: 'NL'
}

# Make the request to Adyen API
result = client.checkout.payments_api.sessions(request_body, headers: { 'Idempotency-Key' => 'UUID' })
puts(result.response)