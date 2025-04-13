<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>

    <h1>Welcome to Customer Registration form</h1>

    <!-- Display success message -->
    

    <!-- Display error message -->
    @if(session('fail'))
        <div style="color: red; font-weight: bold;">
            {{ session('fail') }}
        </div>
    @endif

    <form method="POST" action="{{ route('store') }}">

        @csrf

        <label>First name</label>
        <input type="text" name="fname" value="{{ old('fname') }}" required><br><br>
        @error('fname')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label>Last name</label>
        <input type="text" name="lname" value="{{ old('lname') }}" required><br><br>
        @error('lname')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label>Password</label>
        <input type="password" name="password" required><br><br>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label>Confirm password</label>
        <input type="password" name="password_confirmation" required><br><br>
        @error('password_confirmation')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label>Gender</label>
        <select name="gender">
            <option disabled selected>..Select..</option>
            <option>male</option>
            <option>female</option>
        </select><br><br>
        @error('gender')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <input type="submit" name="register">
    </form>

</body>
</html>
