<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Outils", mappedBy="categorie")
     */
    private $outils;

    public function __construct()
    {
        $this->outils = new ArrayCollection();
    }


    // toString
    // @return string

   public function __toString()
   {
           return $this->getDesignation();
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Outils[]
     */
    public function getOutils(): Collection
    {
        return $this->outils;
    }

    public function addOutil(Outils $outil): self
    {
        if (!$this->outils->contains($outil)) {
            $this->outils[] = $outil;
            $outil->setCategorie($this);
        }

        return $this;
    }

    public function removeOutil(Outils $outil): self
    {
        if ($this->outils->contains($outil)) {
            $this->outils->removeElement($outil);
            // set the owning side to null (unless already changed)
            if ($outil->getCategorie() === $this) {
                $outil->setCategorie(null);
            }
        }

        return $this;
    }
}
