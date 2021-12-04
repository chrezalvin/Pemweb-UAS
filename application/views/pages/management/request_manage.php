<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $jquery ?>
    <?= $bootstrap ?>

    <title>Request Listing</title>
</head>
<body>
    <?= $navbar ?>
    <h1 class="text-center my-4">Requests Pending</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Requester</th>
                <th>Requested Facility</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facilities as $facility): ?>
                <tr>
                    <td><?= $facility['id'] ?></td>
                    <td><?= $facility['requester'] ?></td>
                    <td><?= $facility['facility'] ?></td>
                    <td><?= $facility['date'] ?></td>
                    <td><?= $facility['start_time'] ?></td>
                    <td><?= $facility['end_time'] ?></td>
                    <td>
                        <a href="<?= site_url('management/reject/'.$facility['id']) ?>" class="btn btn-danger">Reject</a>
                        <a href="<?= site_url('management/approve/'.$facility['id']) ?>" class="btn btn-success">Approve</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Requester</th>
                <th>Requested Facility</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Operation</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
