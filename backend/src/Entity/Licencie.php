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

    #[ORM\Column(length: 20)]
    private ?string $num_licence = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_licencie = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_licencie = null;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'licencies')]
    #[ORM\JoinColumn(name: 'categorie_id', referencedColumnName: 'id', nullable: false)]
    private ?Categorie $Categorie = null;

    #[ORM\OneToMany(mappedBy: 'Licencie', targetEntity: Contact::class, orphanRemoval: true)]
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
        return $this->num_licence;
    }

    public function setNumLicence(string $num_licence): static
    {
        $this->num_licence = $num_licence;

        return $this;
    }

    public function getNomLicencie(): ?string
    {
        return $this->nom_licencie;
    }

    public function setNomLicencie(string $nom_licencie): static
    {
        $this->nom_licencie = $nom_licencie;

        return $this;
    }

    public function getPrenomLicencie(): ?string
    {
        return $this->prenom_licencie;
    }

    public function setPrenomLicencie(string $prenom_licencie): static
    {
        $this->prenom_licencie = $prenom_licencie;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;

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
            $contact->setLicencie($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getLicencie() === $this) {
                $contact->setLicencie(null);
            }
        }

        return $this;
    }
}
