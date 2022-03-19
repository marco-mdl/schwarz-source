<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImpressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImpressRepository::class)]
#[ApiResource]
class Impress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 2, unique: true)]
    private $language;

    #[ORM\Column(type: 'text', nullable: true)]
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
