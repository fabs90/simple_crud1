
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="validation.php" method="post" id="frm">
        <p>
        Username : <input type="text" name="username">
        </p>
        <p>
        Password : <input type="password" name="password">
        </p>
        <button type="submit" name="kirim" id="btn">Login</button>
        <p><a href="register.php">Register</a></p>
    </form>

</body>
</html>
