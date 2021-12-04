<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $bootstrap ?>
    <?= $jquery ?>

    <link rel="stylesheet" href="<?= base_url("assets/css/splash.css") ?>" type="text/css">

    <title>Facilebooker</title>
</head>
<body class="welcome">
  <span id="splash-overlay" class="splash"></span>
  <span id="welcome" class="z-depth-4"></span>

  <main class="valign-wrapper d-flex justify-content-center" style="height: 100vh;">
    
    <div class="align-self-center">
        <h1 class="text-center fa-bold">Facilebooker</h1>
        <h4 class="text-center">Booking made easy</h4>
        <div class="d-flex" style="gap: 10px;">
            <a href="<?= site_url("login") ?>" class="btn btn-primary btn-lg w-50">Login</a>
            <a href="<?= site_url("register") ?>" class="btn btn-primary btn-lg w-50">Register</a>
        </div>
    </div>
  
</main>
</body>
</html>