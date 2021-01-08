<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
</head>
<body>
	<p>
		This is the email that is being sent
	</p>
	Order ID: {{ $order->id }} <br>
	Order Email: {{ $order->billing_email}} <br>
	Order Billing Name: {{ $order->billing_name }} <br>
	Order Total:: ${{ Str::currency($order->billing_total) }} <br>
</body>
</html>