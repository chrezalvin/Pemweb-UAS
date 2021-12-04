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
    <h1 class="text-center my-4">All requests</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Requester</th>
                <th>Requested request</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Approval</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request['id'] ?></td>
                    <td><?= $request['requester'] ?></td>
                    <td><?= $request['facility'] ?></td>
                    <td><?= $request['date'] ?></td>
                    <td><?= $request['start_time'] ?></td>
                    <td><?= $request['end_time'] ?></td>
                    <td><?= $request['approval'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Requester</th>
                <th>Requested request</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Approval</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
