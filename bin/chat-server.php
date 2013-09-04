<?php

use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use RatchetApp\Chat;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new WsServer(
        new Chat()
    ),
    8080
);

$server->run();