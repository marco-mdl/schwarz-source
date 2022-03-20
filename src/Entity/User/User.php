<?php

namespace App\Entity\User;

use App\Entity\Address;

class User
{
public function __construct(
    private int $id,
    private string $name,
    private Address $address,
    private string $phone,
    private string $website,
)
{
}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }
}
