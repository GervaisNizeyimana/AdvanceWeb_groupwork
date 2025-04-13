<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<h1>Welcome to Customer Dashboard</h1>
	<p>Balance: {{$customer->balance}}  Frw</p>

	<div>

	<form method="POST" action="">

		@csrf
		<label>deposit Amount</label><input type="number" name="deposit"><br><br>
		<input type="submit" name="action" value="deposit">
		
	</form>
</div><br><br>
<div>

	<form method="POST" action="{{route('dashboard.action')}}">

		@csrf
		<label>Withdraw Amount</label><input type="number" name="withdraw"><br><br>
		<input type="submit" name="action" value="withdraw">
		
	</form>
	</div><br><br>

	<div>

	<form method="POST" action="">

		@csrf
		<label>Reciepient name</label><input type="text" name="fname"><br><br>
		<label>Amount to transfer</label><input type="number" name="deposit"><br><br>
		<input type="submit" name="action" value="transfer">
		
	</form>
	</div>

</body>
</html>