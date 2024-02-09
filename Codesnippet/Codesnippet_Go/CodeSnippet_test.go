package checkout

import (
	"fmt"
	"github.com/adyen/adyen-go-api-library/v9/src/adyen"
	"github.com/adyen/adyen-go-api-library/v9/src/checkout"
	"github.com/adyen/adyen-go-api-library/v9/src/common"
	"golang.org/x/net/context"
	"testing"
)

func Test_Snippet_Session(t *testing.T) {

	t.Run("Session", func(t *testing.T) {

		client := adyen.NewClient(&common.Config{
			ApiKey:      "AQEshmfxLI3HbhJLw0m/n3Q5qf3VeIdYCppEfGBbyawB/isehnLWag91Hdz+6UkQwV1bDb7kfNy1WIxIIkxgBw==-Kphz51iO9Nk6tKXEw5F2OYFfs0dGnzgbHLHq54YFcak=-9+yyk%f:@K$Bk=c;",
			Environment: common.TestEnv,
		})
		service := client.Checkout()

		req := service.PaymentsApi.SessionsInput()
		req = req.CreateCheckoutSessionRequest(checkout.CreateCheckoutSessionRequest{
			MerchantAccount: "PluginDemo_Djoyke_TEST",
			Amount: checkout.Amount{
				Value:    1250,
				Currency: "EUR",
			},
			Reference:   "ref",
			CountryCode: common.PtrString("NL"),
			ReturnUrl:   "https://your-company.com/checkout?shopperOrder=12xy...",
		})
		res, _, _ := service.PaymentsApi.Sessions(context.Background(), req)
		fmt.Print(res.ReturnUrl)//prints
	})
}