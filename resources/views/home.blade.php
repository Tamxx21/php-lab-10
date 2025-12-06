<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Login</h1>
<form action="/login" method="POST">
    @csrf
    <input type="text" name="name" placeholder="username"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">Login</button>
</form>

<br>
<p>Not a member yet? Please <a href="/register">Sign up</a> here</p>
</body>
</html>