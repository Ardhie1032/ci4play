<?php

use CodeIgniter\HTTP\IncomingRequest;

$request = new IncomingRequest(new Config\App(), new CodeIgniter\HTTP\URI());

$db = Config\Database::connect('news');

// Testing log message:
// Threshold option: All Messages
log_message('info', 'Awesome Framework!');
log_message('debug', '???');
log_message('alert', 'Danger!');
log_message('error', 'Found?');
?>
<p>
<h3>The URI being requested (i.e. /about)</h3>
<?= $request->uri->getPath() ?>
</p>

<p>
<h3>Retrieve $_GET and $_POST variables</h3>
getVar: <?= $request->getVar('foo') ?><br>
getGet: <?= $request->getGet('foo') ?><br>
getPost: <?= $request->getPost('foo') ?>
</p>

<p>
<h3>Retrieve JSON from AJAX calls</h3>
<?= $request->getJSON() ?>
</p>

<p>
<h3>Retrieve server variables</h3>
<?= $request->getServer('Host') ?>
</p>

<p>
<h3>Retrieve an HTTP Request header, with case-insensitive names</h3>
<?= $request->getHeader('host') ?><br>
<?= $request->getHeader('Content-Type') ?>
</p>

<p>
<h3>GET, POST, PUT, etc.</h3>
<?= $request->getMethod() ?>
</p>

<p>
<h3>Full URL</h3>
<?= $request->uri ?>
</p>

<?= isset($routesCollection) ?? null ?>
