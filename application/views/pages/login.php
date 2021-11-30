<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $bootstrap ?>
    <?= $jquery ?>

    <style>
        body{
            min-height: 100vh;
        }
    </style>

    <title>Login</title>
</head>
<body class="d-flex justify-content-center">
    <table class="table w-50 align-self-center">
        <?= form_open(current_url(), [
            'id' => 'form',
        ]) ?>
            <tr>
                <td colspan="2" class="text-center"><h2>Login</h2></td>
            </tr>
            <tr class="form-group">
                <td><label for="email" class="label-control">Email</label></td>
                <td><input type="text" class="form-control" id="email" name="email" placeholder="E-mail"></td>
            </tr>
            <tr class="form-group">
                <td><label for="password" class="label-control">password</label></td>
                <td><input type="password" class="form-control" id="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center"><p class="text-danger"><?= $error ?? "" ?></p></td>
            </tr>
            <tr class="form-group">
                <td colspan="2"><input type="submit" class="btn btn-success w-100" name="login" id="login" value="Login"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="<?= site_url('register') ?>">Don't have an account?</a>
                </td>
            </tr>
        <?= form_close() ?>
    </table>
</body>
</html>