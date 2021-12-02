<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $bootstrap ?>
    <?= $jquery ?>

    <title>Facility Details</title>
</head>
<body>
    <?= $navbar ?>
    <h2 class="text-center"><?= $facility['name'] ?></h2>
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('assets/uploads/'.$facility['image']) ?>" 
            alt="<?= $facility['name']." image" ?>" 
            class="image-thumbnail w-25">
    </div>
    <div class="d-flex justify-content-center my-4">
        <div class="w-50">
            <?= $facility['description'] ?>
        </div>
    </div>

    <div class="d-flex justify-content-center" style="gap: 10px;">
        <a href="<?= site_url("user/requests?id=".$facility['id'])?>" class="btn btn-success">Book</a>
        <a href="<?= site_url('user/facilities') ?>" class="btn btn-danger">Back</a>
    </div>
</body>
</html>