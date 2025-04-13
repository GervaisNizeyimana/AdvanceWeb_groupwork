<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	@if(session('loginfail'))

	<h4 style="color: red;">{{session('loginfail')}}</h4>



		
	@endif
	@error('fname')
	<h4 style="color: red;">{{$message}}</h4>


	@enderror
	@error('password')
	<h4 style="color: red;">{{$message}} </h4>


	@enderror
	<form method="post" action="{{route('dashboard')}}">

		@csrf
		<label>First Name</label>
		<input type="text" name="fname"><br>
		<label>Password</label>
		<input type="password" name="password"><br>
		<input type="submit" name="login" value="login">

	</form>

</body>
</html>