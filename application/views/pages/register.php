<?php
    function has_error($field)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(form_error($field))
                return 'is-invalid';
            else
                return 'is-valid';
        }
        else return '';
    }

    function error_message($field, $valid)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(form_error($field))
                return form_error($field);
            else
                return "
                    <div class=\"valid-feedback\">
                        $valid
                    </div>
                    ";
        }
        else return "";
    }
?>

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
                <td colspan="2" class="text-center"><h2>Registration</h2></td>
            </tr>
            <tr class="form-group">
                <td><label for="username" class="label-control">Username</label></td>
                <td>
                    <input type="text" class="form-control <?= has_error('username') ?>" id="username" name="username" placeholder="Your Username Here" value="<?= set_value('username')?>"> 
                    <?= error_message('username', 'looks good!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="email" class="label-control">Email</label></td>
                <td>
                    <input type="text" class="form-control <?= has_error('email') ?>" id="email" name="email" placeholder="Your E-mail Here" value="<?= set_value('email') ?>">
                    <?= error_message('email', 'looks good!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="password" class="label-control">password</label></td>
                <td>
                    <input type="password" class="form-control <?= has_error('password') ?>" id="password" name="password" placeholder="Your Password Here" value="<?= set_value('password') ?>">
                    <?= error_message('password', 'Okay password!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="password_confirm" class="label-control">Confirm Password</label></td>
                <td>
                    <input type="password" class="form-control <?= has_error('password_confirm') ?>" id="password_confirm" name="password_confirm" placeholder="Confirm Your Password Here" value="<?= set_value('password_confirm') ?>">
                    <?= error_message('password_confirm', 'Matched!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td colspan="2"><input type="submit" class="btn btn-success w-100" name="register" id="register" value="Register"></td>
            </tr>
            <tr>
                <td colspan="2"><p class="text-center"><?= $error ?? "" ?>
                    <a href="<?= site_url('login') ?>">Already have an account?</a>
                </td>
            </tr>
            <tr>
                <td colspan="2"><p class="text-danger"><?= $error ?? "" ?></p></td>
            </tr>
        <?= form_close() ?>
    </table>
</body>
</html>