<?php

namespace RatchetApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $connection)
    {
        $this->clients->attach($connection);

        echo "[{$connection->resourceId}] New connection.\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;

        echo sprintf(
            "Connection %d sending message \"%s\" to %d other connection%s\n",
            $from->resourceId,
            trim($msg),
            $numRecv,
            ($numRecv === 1) ? '' : 's'
        );

        foreach($this->clients as $client) {
            if($from !== $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $connection)
    {
        $this->clients->detach($connection);

        echo "[{$connection->resourceId}] Connection closed.\n";
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $connection->close();
    }
}