require 'json'
require 'adyen-ruby-api-library'

client = Adyen::Client.new
client.api_key = 'AQEshmfxLI3HbhJLw0m/n3Q5qf3VeIdYCppEfGBbyawB/isehnLWag91Hdz+6UkQwV1bDb7kfNy1WIxIIkxgBw==-Kphz51iO9Nk6tKXEw5F2OYFfs0dGnzgbHLHq54YFcak=-9+yyk%f:@K$Bk=c;'
client.env = :test # Set to "live" for live environment

request_body = {
    merchantAccount: 'PluginDemo_Djoyke_TEST',
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