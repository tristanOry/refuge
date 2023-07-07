<?php

namespace App\Entity;

use App\Repository\RacesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RacesRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'family')]
    private ?self $race = null;

    #[ORM\OneToMany(mappedBy: 'races', targetEntity: self::class)]
    private Collection $family;

    #[ORM\OneToMany(mappedBy: 'race', targetEntity: Animal::class, orphanRemoval: true)]
    private Collection $animals;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'aboutRaces')]
    private Collection $articles;

    public function __construct()
    {
        $this->family = new ArrayCollection();
        $this->animals = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getRace(): ?self
    {
        return $this->race;
    }

    public function setRace(?self $race): static
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFamily(): Collection
    {
        return $this->family;
    }

    public function addFamily(self $family): static
    {
        if (!$this->family->contains($family)) {
            $this->family->add($family);
            $family->setRace($this);
        }

        return $this;
    }

    public function removeFamily(self $family): static
    {
        if ($this->family->removeElement($family)) {
            // set the owning side to null (unless already changed)
            if ($family->getRace() === $this) {
                $family->setRace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setRace($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getRace() === $this) {
                $animal->setRace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->addAboutRace($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            $article->removeAboutRace($this);
        }

        return $this;
    }
}
