<?php

namespace App\Entity;

use App\Repository\ProposerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProposerRepository::class)
 */
class Proposer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, name="tarifnuite")
     */
    private $tarifNuite;

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="tarifs")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Column(name="idhotel")
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieChambre::class, inversedBy="tarifs")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Column(name="idcategorie")
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifNuite(): ?string
    {
        return $this->tarifNuite;
    }

    public function setTarifNuite(string $tarifNuite): self
    {
        $this->tarifNuite = $tarifNuite;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }
    
//    public function getIdHotel(): ?string 
//    {
//        return $this->getHotel()->getId();
//    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getCategorie(): ?CategorieChambre
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieChambre $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
