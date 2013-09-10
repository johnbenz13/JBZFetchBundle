<?php

namespace JBZ\FetchBundle\Tests\Fetch;

use JBZ\FetchBundle\Fetch\FetchWrapper;

class FetchWrapperTest extends \PHPUnit_Framework_TestCase
{
    public function testServerConnection()
    {
        $host = 'imap.foo.com';
        $port = 993;
        $fetchWrapper = new FetchWrapper($host, $port);

        $this->assertTrue(true);
    }
}
