<link rel="stylesheet" type="text/css" href="//assets.cdn/bootstrap/dist/css/bootstrap.min.css">

<div class="container">
<table class="table table-bordered table-hovered">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
<?php foreach ($results as $col): ?>
    <tbody>
        <tr>
            <td><?= $col->actor_id ?></td>
            <td><?= $col->first_name ?></td>
            <td><?= $col->last_name ?></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>
</div>
Total Results: <?= $totalItems ?>
<?= $paging ?>

