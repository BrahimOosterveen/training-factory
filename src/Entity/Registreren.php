<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistrerenRepository")
 */
class Registreren
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $betaling;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="registrerens")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lessen", inversedBy="registrerens")
     */
    private $lessen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBetaling(): ?string
    {
        return $this->betaling;
    }

    public function setBetaling(string $betaling): self
    {
        $this->betaling = $betaling;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLessen(): ?lessen
    {
        return $this->lessen;
    }

    public function setLessen(?lessen $lessen): self
    {
        $this->lessen = $lessen;

        return $this;
    }
}
