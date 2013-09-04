<?php

use Ratchet\Server\IoServer;
use RatchetApp\Chat;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new Chat(),
    8080
);

$server->run();