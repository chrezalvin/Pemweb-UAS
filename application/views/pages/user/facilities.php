<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $bootstrap ?>
    <?= $jquery ?>

    <title>Facilities List</title>
</head>
<body>
    <?= $navbar ?>
    <h1 class="text-center">Facility Listing</h1>
    <p class="text-center">Preview and book facilities</p>

    <!-- grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 20px;" class="mx-4 my-4">
        <?php foreach($facilities as $facility): ?>
            <div class="card" style="width: 18rem;">
            <!-- bootstrap card -->
                <img src="<?= base_url('assets/uploads/'.$facility['image']) ?>" class="card-img-top" alt="<?= "image".$facility['name'] ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= $facility['name'] ?></h5>
                    <a href="<?= site_url("user/facility/".$facility['id']) ?>" class="btn btn-primary">Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>