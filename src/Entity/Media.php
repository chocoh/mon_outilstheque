<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $url_media;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Outils", inversedBy="media")
     */
    private $outil;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString()
    {
            return $this->geturlMedia();
    }

    public function geturlMedia(): ?string
    {
        return $this->url_media;
    }

    public function seturlMedia(string $url_media): self
    {
        $this->url_media = $url_media;

        return $this;
    }

    public function getOutil(): ?outils
    {
        return $this->outil;
    }

    public function setOutil(?outils $outil): self
    {
        $this->outil = $outil;

        return $this;
    }
}
