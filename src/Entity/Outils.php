<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OutilsRepository")
 */
class Outils
{
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

    public function getId(): ?int
    {
        return $this->id;
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
}
