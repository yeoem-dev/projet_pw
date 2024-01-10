<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Licencie $licencieId = null;

    #[ORM\Column(length: 255)]
    private ?string $emailEducateur = null;

    #[ORM\Column(length: 255)]
    private ?string $mdpEducateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicencieId(): ?Licencie
    {
        return $this->licencieId;
    }

    public function setLicencieId(Licencie $licencieId): static
    {
        $this->licencieId = $licencieId;

        return $this;
    }

    public function getEmailEducateur(): ?string
    {
        return $this->emailEducateur;
    }

    public function setEmailEducateur(string $emailEducateur): static
    {
        $this->emailEducateur = $emailEducateur;

        return $this;
    }

    public function getMdpEducateur(): ?string
    {
        return $this->mdpEducateur;
    }

    public function setMdpEducateur(string $mdpEducateur): static
    {
        $this->mdpEducateur = $mdpEducateur;

        return $this;
    }
}
