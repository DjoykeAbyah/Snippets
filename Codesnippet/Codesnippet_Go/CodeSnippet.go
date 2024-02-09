package adyen//or
package checkout//check this 

import (
	"github.com/adyen/adyen-go-api-library/v9/src/adyen"
	"github.com/adyen/adyen-go-api-library/v9/src/checkout"
	"github.com/adyen/adyen-go-api-library/v9/src/common"
)

func main() {
	client := adyen.NewClient(&common.Config{
		ApiKey: "YOUR_API_KEY",
		Environment: common.TestEnv,
	})
	service := client.Checkout()

	req := service.PaymentsApi.SessionsInput()
	req = req.CreateCheckoutSessionRequest(checkout.CreateCheckoutSessionRequest{
		MerchantAccount: "YOUR_MERCHANT_ACCOUNT",
		Amount: checkout.Amount{
			Value:    1250,
			Currency: "EUR",
		},
		ReturnUrl:   "https://your-company.com/checkout?shopperOrder=12xy..."})
		Reference:   "YOUR_PAYMENT_REFERENCE",
		CountryCode: common.PtrString("NL"),
	res := service.PaymentsApi.SessionsInput()
}
