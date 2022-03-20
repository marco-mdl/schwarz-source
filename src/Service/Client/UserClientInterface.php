<?php

namespace App\Service\Client;

interface UserClientInterface
{
    public function getUsersResponse(): array;
}
