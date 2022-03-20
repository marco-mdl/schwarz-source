<?php

namespace App\Tests\integration;

use App\Service\Client\DummyUserClient;
use App\Service\Client\JsonPlaceholderClient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class JsonPlaceholderClientTest extends KernelTestCase
{

    public function testGetUsers(): void
    {
        $jsonPlaceholderClient = new JsonPlaceholderClient();
        $dummyUserClient = new DummyUserClient();
        $this
            ->assertEquals(
                $dummyUserClient->getUsersResponse(),
                $jsonPlaceholderClient->getUsersResponse()
            );
    }
}
