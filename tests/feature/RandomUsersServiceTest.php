<?php

namespace App\Tests\feature;

use App\Service\Client\DummyUserClient;
use App\Service\RandomUsersService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RandomUsersServiceTest extends KernelTestCase
{

    public function testGetUsers(): void
    {

        $randomUsersService = self::getContainer()->get(RandomUsersService::class);

        $userCollection = $randomUsersService->getRandomUsers();

        $this
            ->assertCount(10, $userCollection);

        $usersArray = (new DummyUserClient())->getUsersResponse();

        foreach ($userCollection->getUsers() as $user){
            $key = array_search($user->getId(), array_column($usersArray, 'id'));
            $userArray = $usersArray[$key];
            $address = $user->getAddress();
            $addressArray = $userArray['address'];
            $this
                ->assertEquals($user->getName(),$userArray['name']);
            $this
                ->assertEquals($user->getPhone(),$userArray['phone']);
            $this
                ->assertEquals($user->getWebsite(),$userArray['website']);
            $this
                ->assertEquals($address->getCity(),$addressArray['city']);
            $this
                ->assertEquals($address->getStreet(),$addressArray['street']);
            $this
                ->assertEquals($address->getSuite(),$addressArray['suite']);
            $this
                ->assertEquals($address->getZipcode(),$addressArray['zipcode']);
        }
    }
}
