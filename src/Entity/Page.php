<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PageRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Datetime;

#[
    ORM\Entity(repositoryClass: PageRepository::class),
    ORM\Table(name: "page"),
]
class Page
{
    #[
        ORM\Id,
        ORM\Column(type: "integer"),
        ORM\GeneratedValue(strategy: "IDENTITY"),
    ]
    private int $id;

    #[
        ORM\Column(type: "datetime"),
        Assert\NotBlank(message: 'De datum mag niet leeg zijn.'),
    ]
    private DateTime $date;

    #[
        ORM\Column(type: "integer"),
    ]
    private int $rating;

    #[
        ORM\Column(type: "text", nullable: true),
    ]
    private ?string $contentPositive = null;

    #[
        ORM\Column(type: "text", nullable: true),
    ]
    private ?string $contentNegative = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getContentPositive(): string
    {
        return $this->contentPositive;
    }

    public function setContentPositive(?string $contentPositive): void
    {
        $this->contentPositive = $contentPositive;
    }

    public function getContentNegative(): string
    {
        return $this->contentNegative;
    }

    public function setContentNegative(?string $contentNegative): void
    {
        $this->contentNegative = $contentNegative;
    }
}
