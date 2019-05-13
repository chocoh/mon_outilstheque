<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $ulr_media;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUlrMedia(): ?string
    {
        return $this->ulr_media;
    }

    public function setUlrMedia(string $ulr_media): self
    {
        $this->ulr_media = $ulr_media;

        return $this;
    }
}
