package adyen//or
package checkout//check this 

import (
	"github.com/adyen/adyen-go-api-library/v9/src/adyen"
	"github.com/adyen/adyen-go-api-library/v9/src/checkout"
	"github.com/adyen/adyen-go-api-library/v9/src/common"
)

func main() {
	client := adyen.NewClient(&common.Config{
		ApiKey:      "your api key",
		Environment: common.TestEnv,
	})
	service := client.Checkout()

	req := service.PaymentsApi.SessionsInput()
	req = req.CreateCheckoutSessionRequest(checkout.CreateCheckoutSessionRequest{
		MerchantAccount: "your merchant account",
		Amount: checkout.Amount{
			Value:    1250,
			Currency: "EUR",
		},
		Reference:   "ref",
		CountryCode: common.PtrString("NL"),
		ReturnUrl:   "https://your-company.com/checkout?shopperOrder=12xy..."})
	res := service.PaymentsApi.SessionsInput()
}
