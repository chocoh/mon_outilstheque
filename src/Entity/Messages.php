<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessagesRepository")
 */
class Messages
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
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_envoi;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="messages")
     */
    private $expediteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="messages")
     */
    private $destinataire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDateEnvoi(\DateTimeInterface $date_envoi): self
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }

    public function getExpediteur(): ?users
    {
        return $this->expediteur;
    }

    public function setExpediteur(?users $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getDestinataire(): ?users
    {
        return $this->destinataire;
    }

    public function setDestinataire(?users $destinataire): self
    {
        $this->destinataire = $destinataire;

        return $this;
    }
}
