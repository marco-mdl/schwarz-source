<?php

namespace App\Service;

use App\Entity\Address;
use App\Entity\User\User;
use App\Entity\User\UserCollection;
use App\Service\Client\UserClientInterface;

class RandomUsersService
{
    public function __construct(private UserClientInterface $userClient)
    {
    }

    public function getRandomUsers(): UserCollection
    {
        $userArrays = $this
            ->userClient
            ->getUsersResponse();
        $users = [];
        foreach ($userArrays as $userArray) {
            $address = $userArray['address'];
            $users[] = new User(
                id: $userArray['id'],
                name: $userArray['name'],
                address: new Address(
                    street: $address['street'],
                    suite: $address['suite'],
                    city: $address['city'],
                    zipcode: $address['zipcode']
                ),
                phone: $userArray['phone'],
                website: $userArray['website']
            );
        }

        return new UserCollection(...$users);
    }
}
