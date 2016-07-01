<link rel="stylesheet" type="text/css" href="//assets.cdn/bootstrap/dist/css/bootstrap.min.css">

<div class="container">
<table class="table table-bordered table-hovered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Dibuat</th>
            <th>Disunting</th>
        </tr>
    </thead>
<?php foreach ($results as $row): ?>
    <tbody>
        <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->title ?></td>
            <td><?= $row->text ?></td>
            <td><?= $row->dibuat ?></td>
            <td><?= $row->disunting ?></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>
</div>
Total Results: <?= $totalItems ?>
<?= $paging ?>

