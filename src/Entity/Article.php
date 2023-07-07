<?php

namespace App\Entity;

use App\Interfaces\TimestampedInterface;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article implements TimestampedInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $featuredText = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Animal::class, inversedBy: 'articles')]
    private Collection $aboutAnimals;

    #[ORM\ManyToMany(targetEntity: Race::class, inversedBy: 'articles')]
    private Collection $aboutRaces;

    public function __construct()
    {
        $this->aboutAnimals = new ArrayCollection();
        $this->aboutRaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getFeaturedText(): ?string
    {
        return $this->featuredText;
    }

    public function setFeaturedText(?string $featuredText): static
    {
        $this->featuredText = $featuredText;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAboutAnimals(): Collection
    {
        return $this->aboutAnimals;
    }

    public function addAboutAnimal(Animal $aboutAnimal): static
    {
        if (!$this->aboutAnimals->contains($aboutAnimal)) {
            $this->aboutAnimals->add($aboutAnimal);
        }

        return $this;
    }

    public function removeAboutAnimal(Animal $aboutAnimal): static
    {
        $this->aboutAnimals->removeElement($aboutAnimal);

        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getAboutRaces(): Collection
    {
        return $this->aboutRaces;
    }

    public function addAboutRace(Race $aboutRace): static
    {
        if (!$this->aboutRaces->contains($aboutRace)) {
            $this->aboutRaces->add($aboutRace);
        }

        return $this;
    }

    public function removeAboutRace(Race $aboutRace): static
    {
        $this->aboutRaces->removeElement($aboutRace);

        return $this;
    }
}
