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

    <title>Request Form</title>
</head>
<body>
    <?= $navbar ?>

    <div class="error block-message block-danger">
    <p class="text-danger text-center"><?= $error ?? "" ?></p>
    </div>

    <div class="d-flex justify-content-center my-4">
        <table class="table w-50">
        <?= form_open(current_url()) ?>
            <tr>
                <td colspan="2" class="text-center">
                    <h3>Request Form</h3>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="facility_id" class="label-control">Facility</label></td>
                <td>
                    <select class="form-control <?= has_error('facility_id') ?>" id="facility_id" name="facility_id">
                        <?php foreach ($facilities as $facility): ?>
                            <option value="<?= $facility['id'] ?>" 
                                    <?= $id == $facility['id'] ? "selected" : "" ?>
                                    ><?= $facility['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= error_message('facility_id', 'okay!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="date" class="label-control">Reservation Date</label></td>
                <td>
                    <input type="date" 
                            class="form-control <?= has_error('date') ?>" 
                            id="date" 
                            name="date" 
                            value="<?= set_value('date') ?>"
                    >
                    <?= error_message('date', 'okay!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="start_time" class="label-control">Start Time</label></td>
                <td>
                    <input type="time" 
                            class="form-control <?= has_error('start_time') ?>" 
                            id="start_time" 
                            name="start_time" 
                            value="<?= set_value('start_time')?>"
                    >
                    <?= error_message('start_time', 'okay!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td><label for="end_time" class="label-control">End Time</label></td>
                <td>
                    <input type="time" 
                            class="form-control <?= has_error('end_time') ?>" 
                            id="end_time" 
                            name="end_time" 
                            value="<?= set_value('end_time')?>"
                    >
                    <?= error_message('end_time', 'okay!') ?>
                </td>
            </tr>
            <tr class="form-group">
                <td colspan="2" class="d-flex" style="gap: 10px">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
                    <a href="<?= site_url("user/facilities") ?>" class="btn btn-warning">Return to Facilities</a>
                </td>
            </tr>
        <?= form_close() ?>
        </table>
    </div>

</body>
</html>