<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    private ?string $numLicence = null;

    #[ORM\Column(length: 255)]
    private ?string $nomLicencie = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomCategorie = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $CategorieId = null;

    #[ORM\OneToMany(mappedBy: 'licencieId', targetEntity: Contact::class, orphanRemoval: true)]
    private Collection $contacts;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLicence(): ?string
    {
        return $this->numLicence;
    }

    public function setNumLicence(string $numLicence): static
    {
        $this->numLicence = $numLicence;

        return $this;
    }

    public function getNomLicencie(): ?string
    {
        return $this->nomLicencie;
    }

    public function setNomLicencie(string $nomLicencie): static
    {
        $this->nomLicencie = $nomLicencie;

        return $this;
    }

    public function getPrenomCategorie(): ?string
    {
        return $this->prenomCategorie;
    }

    public function setPrenomCategorie(string $prenomCategorie): static
    {
        $this->prenomCategorie = $prenomCategorie;

        return $this;
    }

    public function getCategorieId(): ?Categorie
    {
        return $this->CategorieId;
    }

    public function setCategorieId(?Categorie $CategorieId): static
    {
        $this->CategorieId = $CategorieId;

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): static
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setLicencieId($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getLicencieId() === $this) {
                $contact->setLicencieId(null);
            }
        }

        return $this;
    }
}
