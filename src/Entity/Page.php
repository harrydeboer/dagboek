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
    private int $ratingMorning;

    #[
        ORM\Column(type: "integer"),
    ]
    private int $ratingAfternoon;

    #[
        ORM\Column(type: "integer"),
    ]
    private int $ratingEvening;

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

    public function getRatingMorning(): int
    {
        return $this->ratingMorning;
    }

    public function setRatingMorning(int $rating): void
    {
        $this->ratingMorning = $rating;
    }

    public function getRatingAfternoon(): int
    {
        return $this->ratingAfternoon;
    }

    public function setRatingAfternoon(int $rating): void
    {
        $this->ratingAfternoon = $rating;
    }

    public function getRatingEvening(): int
    {
        return $this->ratingEvening;
    }

    public function setRatingEvening(int $rating): void
    {
        $this->ratingEvening = $rating;
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
