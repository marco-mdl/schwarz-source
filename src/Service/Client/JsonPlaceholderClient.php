<?php

namespace App\Service\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class JsonPlaceholderClient implements UserClientInterface
{
    private HttpClientInterface $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClient::create(
            [
                'base_uri' => 'https://jsonplaceholder.typicode.com',
            ]
        );
    }

    public function getClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    public function getUsersResponse(): array
    {
        return json_decode(
            $this->httpClient->request(Request::METHOD_GET, 'users')->getContent(),
            true
        );
    }
}
