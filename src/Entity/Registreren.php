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
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $betaling;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="registrerens")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\lessen", inversedBy="registrerens")
     */
    private $lessen_id;

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

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLessenId(): ?lessen
    {
        return $this->lessen_id;
    }

    public function setLessenId(?lessen $lessen_id): self
    {
        $this->lessen_id = $lessen_id;

        return $this;
    }
}
