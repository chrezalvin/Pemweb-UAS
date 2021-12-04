<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $bootstrap ?>
    <?= $jquery ?>

    <?php foreach($crud['js_files'] as $src): ?>
        <script src="<?= $src ?>" type="text/javascript" defer></script>
    <?php endforeach ?>

    <?php foreach($crud['css_files'] as $src): ?>
        <link rel="stylesheet" href="<?= $src ?>" type="text/css">
    <?php endforeach ?>

    <title>User List</title>
</head>
<body>
    <?= $navbar ?>
    <h1 class="text-center">User Listing</h1>

    <?= $crud['output'] ?>
</body>
</html>