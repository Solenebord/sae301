<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column]
    private ?int $Capacite = null;

    #[ORM\OneToMany(mappedBy: 'Lieu', targetEntity: Event::class)]
    private Collection $events�;

    #[ORM\OneToMany(mappedBy: 'Lieu', targetEntity: Event::class)]
    private Collection $events;

    public function __construct()
    {
        $this->events� = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->Capacite;
    }

    public function setCapacite(int $Capacite): self
    {
        $this->Capacite = $Capacite;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents�(): Collection
    {
        return $this->events�;
    }

    public function addEvents(Event $events): self
    {
        if (!$this->events�->contains($events)) {
            $this->events�->add($events);
            $events->setLieu($this);
        }

        return $this;
    }

    public function removeEvents(Event $events): self
    {
        if ($this->events�->removeElement($events)) {
            // set the owning side to null (unless already changed)
            if ($events->getLieu() === $this) {
                $events->setLieu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setLieu($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getLieu() === $this) {
                $event->setLieu(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->Nom;
    }
}
