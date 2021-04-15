# paymentnepal-diafan  
1. Copy plugin catalogue into your site root
3. Go to the administrator interface of your site, "Payment" menu and click "Add". Then choose Paymentnepal payment type
3. Configure payment method:  
  Enter secret key and payment key from service settings inside Paymentnepal merchant area
4. In your service settings (paymentnepal merchant area) fill in next params:  

* notification URL: http://www.your-site.com/payment/get/paymentnepal/result
* Success URL: http://www.your-site.com/payment/get/paymentnepal/success
* Error URL: http://www.your-site.com/payment/get/paymentnepal/fail
