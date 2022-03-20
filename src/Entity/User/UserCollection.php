<?php

namespace App\Entity\User;

use Iterator;

class UserCollection implements Iterator
{
    private array $values;

    public function __construct(User ...$users)
    {
        $this->values = $users;
    }

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->values;
    }

    public function current(): mixed
    {
        return current($this->values);
    }

    public function key(): mixed
    {
        return key($this->values);
    }

    public function next(): void
    {
        next($this->values);
    }

    public function rewind(): void
    {
        reset($this->values);
    }

    public function valid(): bool
    {
        return $this->current() !== false;
    }
}
