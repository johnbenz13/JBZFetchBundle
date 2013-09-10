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
            $this->authenticate($username, $password);
        }
    }

    /**
     * Authenticate to the server
     *
     * @param string $username
     * @param string $password
     */
    public function authenticate($username, $password)
    {
        $this->server->setAuthentication($username, $password);
    }

    /**
     * Get the imap stream
     *
     * @return resource
     */
    public function getImapStream()
    {
        return $this->server->getImapStream();
    }

    /**
     * Retrieve the messages from the server
     *
     * @param integer|null $limit
     *
     * @return Array an array of ImapMessage objects
     */
    public function getMessages($limit = null)
    {
        return $this->server->getMessages($limit);
    }

    /**
     * Return the recently received emails
     *
     * @param integer $limit
     *
     * @return Array        an array of ImapMessages objects
     */
    public function getRecentMessages($limit = null)
    {
        return $this->server->getRecentMessages($limit);
    }

    /**
     * Return the number of messages
     *
     * @return integer
     */
    public function getNumberOfMessages()
    {
        return $this->server->numMessages();
    }

    /**
     * Remove all the messages flagged for deletion from the mailbox
     *
     * @return boolean
     */
    public function expunge()
    {
        return $this->server->expunge();
    }

    /**
     * Check if the given mailbox exists
     *
     * @param string  $mailbox
     *
     * @return boolean
     */
    public function hasMailbox($mailbox)
    {
        return $this->server->hasMailbox($mailbox);
    }

    /**
     * Create the given mailbox
     *
     * @param string $mailbox
     *
     * @return boolean
     */
    public function createMailbox($mailbox)
    {
        return $this->server->createMailbox($mailbox);
    }

    /**
     * Search according criteria as defined in php "imap_search" documentation
     *
     * @param string        $criteria
     * @param null|integer  $limit
     *
     * @link http://us.php.net/imap_search
     *
     * @return array    An array of ImapMessage objects
     */
    public function search($criteria = 'ALL', $limit = null)
    {
        return $this->server->search($criteria, $limit);
    }

    /**
     * Search mails by subject
     *
     * @param string        $subject
     * @param integer|null  $limit
     *
     * @return array          An array of ImapMessage objects
     */
    public function searchBySubject($subject, $limit = null)
    {
        $criteria = 'SUBJECT "' . $subject . '"';

        return $this->search($criteria, $limit);
    }
}
