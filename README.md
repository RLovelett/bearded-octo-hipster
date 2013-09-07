bearded-octo-hipster
====================

1. Write code.
2. ???
3. Profit!

## Setup

Install composer. Then run `composer install`.

Once all the dependencies are configured from the root directory of the project run `php bin/chat-server.php` to start
the WebSocket server and `php -S localhost:8000 -t public/` to start the PHP webserver.

You should now be able to navigate to `http://localhost:8000` in a browser and utilize the application.

If you want the webserver to be accessible outside of localhost use `php -S 0.0.0.0:8000 -t public/`.
