<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h4><?= $msg ?></h4>
    </div>
    <form action="<?= url('/verify') ?>" method="post">
        <label for="email">Eamil: </label>
        <input type="email" name="email" id="email">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <button type="submit">Submit</button>
    </form>
</body>
</html>