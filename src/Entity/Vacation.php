<?php

namespace App\Entity;

use App\Repository\VacationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacationRepository::class)
 */
class Vacation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", name="dateheuredebut")
     */
    private $dateheureDebut;

    /**
     * @ORM\Column(type="datetime", name="dateheurefin")
     */
    private $dateheureFin;

    /**
     * @ORM\OneToMany(targetEntity=Atelier::class, mappedBy="vacations")
     */
    private $vacations;

    public function __construct()
    {
        $this->vacations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateheureDebut(): ?\DateTimeInterface
    {
        return $this->dateheureDebut;
    }

    public function setDateheureDebut(\DateTimeInterface $dateheureDebut): self
    {
        $this->dateheureDebut = $dateheureDebut;

        return $this;
    }

    public function getDateheureFin(): ?\DateTimeInterface
    {
        return $this->dateheureFin;
    }

    public function setDateheureFin(\DateTimeInterface $dateheureFin): self
    {
        $this->dateheureFin = $dateheureFin;

        return $this;
    }

    /**
     * @return Collection<int, Atelier>
     */
    public function getVacations(): Collection
    {
        return $this->vacations;
    }

    public function addVacation(Atelier $vacation): self
    {
        if (!$this->vacations->contains($vacation)) {
            $this->vacations[] = $vacation;
            $vacation->setVacations($this);
        }

        return $this;
    }

    public function removeVacation(Atelier $vacation): self
    {
        if ($this->vacations->removeElement($vacation)) {
            // set the owning side to null (unless already changed)
            if ($vacation->getVacations() === $this) {
                $vacation->setVacations(null);
            }
        }

        return $this;
    }
}
