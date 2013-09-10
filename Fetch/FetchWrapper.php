<?php

namespace JBZ\FetchBundle\Fetch;

use Fetch\Server;

/**
 * Wrapper for Fetch Class
 *
 * @author Jonathan Bensaid <john@bensaidj.com>
 */
class FetchWrapper
{
    protected $server;

    /**
     * Initialize a server connection
     *
     * @param string    $host
     * @param integer   $port
     * @param string    $username
     * @param string    $password
     */
    public function __construct($host, $port, $username = null, $password = '')
    {
        $this->server = new Server($host, $port);

        if ($username) {
            // Initialize the connection
            $this->server->setAuthentication($username, $password);
        }
    }

    /**
     * Retrieve the messages from the server
     * @return [type] [description]
     */
    public function getMessages()
    {
        return $this->server->getMessages();
    }
}
