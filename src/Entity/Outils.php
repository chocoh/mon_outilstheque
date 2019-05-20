<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OutilsRepository")
 */
class Outils{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_outil;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descriptifs;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_enregistrement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree_emprunt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="outils")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="outils")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="outil")
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Emprunt", mappedBy="outil")
     */
    private $emprunts;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
            return $this->getNomOutil();
    }

    public function getNomOutil(): ?string
    {
        return $this->nom_outil;
    }

    public function setNomOutil(string $nom_outil): self
    {
        $this->nom_outil = $nom_outil;

        return $this;
    }

    public function getDescriptifs(): ?string
    {
        return $this->descriptifs;
    }

    public function setDescriptifs(string $descriptifs): self
    {
        $this->descriptifs = $descriptifs;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    public function setDateEnregistrement(?\DateTimeInterface $date_enregistrement): self
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    public function getDureeEmprunt(): ?int
    {
        return $this->duree_emprunt;
    }

    public function setDureeEmprunt(?int $duree_emprunt): self
    {
        $this->duree_emprunt = $duree_emprunt;

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getUser(): ?users
    {
        return $this->user;
    }

    public function setUser(?users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setOutil($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getOutil() === $this) {
                $medium->setOutil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->setOutil($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->contains($emprunt)) {
            $this->emprunts->removeElement($emprunt);
            // set the owning side to null (unless already changed)
            if ($emprunt->getOutil() === $this) {
                $emprunt->setOutil(null);
            }
        }

        return $this;
    }
}
