<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
</head>
<body>
    @if($notLogged)
        <h1>You must log in first!</h1>
        <a href="/">Go to Login</a>
    @else
        <h1>Hello {{ $user->name }}</h1>
    @endif
</body>
</html>
