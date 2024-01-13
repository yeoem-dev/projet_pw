<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_contact = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_contact = null;

    #[ORM\Column(length: 100)]
    private ?string $email_contact = null;

    #[ORM\Column(length: 15)]
    private ?string $num_tel_contact = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Licencie $Licencie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nom_contact;
    }

    public function setNomContact(string $nom_contact): static
    {
        $this->nom_contact = $nom_contact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenom_contact;
    }

    public function setPrenomContact(string $prenom_contact): static
    {
        $this->prenom_contact = $prenom_contact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->email_contact;
    }

    public function setEmailContact(string $email_contact): static
    {
        $this->email_contact = $email_contact;

        return $this;
    }

    public function getNumTelContact(): ?string
    {
        return $this->num_tel_contact;
    }

    public function setNumTelContact(string $num_tel_contact): static
    {
        $this->num_tel_contact = $num_tel_contact;

        return $this;
    }

    public function getLicencie(): ?Licencie
    {
        return $this->Licencie;
    }

    public function setLicencie(?Licencie $Licencie): static
    {
        $this->Licencie = $Licencie;

        return $this;
    }
}
