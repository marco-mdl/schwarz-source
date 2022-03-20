<?php

namespace App\Entity;

class Address
{
public function __construct(
    private string $street,
    private string $suite,
    private string $city,
    private string $zipcode
)
{
}

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getSuite(): string
    {
        return $this->suite;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }
}
