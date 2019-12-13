<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beschrijving;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tijd;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $kosten;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lessen", mappedBy="training")
     */
    private $lessens;

    public function __construct()
    {
        $this->lessens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    public function getTijd(): ?string
    {
        return $this->tijd;
    }

    public function setTijd(string $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getKosten(): ?string
    {
        return $this->kosten;
    }

    public function setKosten(?string $kosten): self
    {
        $this->kosten = $kosten;

        return $this;
    }

    /**
     * @return Collection|Lessen[]
     */
    public function getLessens(): Collection
    {
        return $this->lessens;
    }

    public function addLessen(Lessen $lessen): self
    {
        if (!$this->lessens->contains($lessen)) {
            $this->lessens[] = $lessen;
            $lessen->setTraining($this);
        }

        return $this;
    }

    public function removeLessen(Lessen $lessen): self
    {
        if ($this->lessens->contains($lessen)) {
            $this->lessens->removeElement($lessen);
            // set the owning side to null (unless already changed)
            if ($lessen->getTraining() === $this) {
                $lessen->setTraining(null);
            }
        }

        return $this;
    }
}
