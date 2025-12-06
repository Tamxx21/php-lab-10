<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h1>Register</h1>

<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="username"><br><br>
    <input type="email" name="email" placeholder="email"><br><br>
    <input type="password" name="password" placeholder="password"><br><br>
    <button type="submit">Register</button>
</form>

<br>
<a href="/">Back to Login</a>



</body>
</html>
