<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <form action="<?= url('/register') ?>" method="post">
        <label for="email">Eamil: </label>
        <input type="email" name="email" id="email">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <button type="submit">Submit</button>
    </form>
</body>
</html>