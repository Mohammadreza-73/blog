<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <div>
        <h4><?= session('error') ?? session('succes') ?></h4>
    </div>
    <form action="<?= url('/register') ?>" method="post">
        <label for="email">Eamil: </label>
        <input type="email" name="email" id="email">
        <?php if (isset($errors['email'])): ?>
            <small><?= $errors['email'] ?></small>
        <?php endif; ?>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <?php if (isset($errors['password'])): ?>
            <small><?= $errors['password'] ?></small>
        <?php endif; ?>

        <button type="submit">Submit</button>
    </form>
</body>
</html>