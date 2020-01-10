<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessenRepository")
 */
class Lessen
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $tijd;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locatie;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_personen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Training", inversedBy="lessens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    /**
     * @ORM\Column(type="integer")
     */
    private $lokaal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registreren", mappedBy="lessen_id")
     */
    private $registrerens;

    public function __construct()
    {
        $this->registrerens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->tijd;
    }

    public function setTijd(\DateTimeInterface $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): self
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getMaxPersonen(): ?int
    {
        return $this->max_personen;
    }

    public function setMaxPersonen(int $max_personen): self
    {
        $this->max_personen = $max_personen;

        return $this;
    }

    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): self
    {
        $this->training = $training;

        return $this;
    }

    public function getLokaal(): ?int
    {
        return $this->lokaal;
    }

    public function setLokaal(int $lokaal): self
    {
        $this->lokaal = $lokaal;

        return $this;
    }

    /**
     * @return Collection|Registreren[]
     */
    public function getRegistrerens(): Collection
    {
        return $this->registrerens;
    }

    public function addRegistreren(Registreren $registreren): self
    {
        if (!$this->registrerens->contains($registreren)) {
            $this->registrerens[] = $registreren;
            $registreren->setLessenId($this);
        }

        return $this;
    }

    public function removeRegistreren(Registreren $registreren): self
    {
        if ($this->registrerens->contains($registreren)) {
            $this->registrerens->removeElement($registreren);
            // set the owning side to null (unless already changed)
            if ($registreren->getLessenId() === $this) {
                $registreren->setLessenId(null);
            }
        }

        return $this;
    }




}
