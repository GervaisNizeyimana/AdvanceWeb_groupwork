
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
</head>
<body>

   <!--  @if(session('login'))
        <div style="color: green; font-weight: bold;">
            {{ session('login') }}
        </div>
    @endif -->

	<h1>Welcome to Customer Home</h1>
	<a href="{{route('register')}}">Register</a><br><br><a href="{{route('login')}}">Login</a>

</body>
</html>