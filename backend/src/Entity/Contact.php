<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: MailContact::class, mappedBy: 'contacts')]
    private Collection $mailContacts;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailContact::class, orphanRemoval: true)]
    private Collection $mailContactEnvoye;

    public function __construct()
    {
        $this->mailContacts = new ArrayCollection();
        $this->mailContactEnvoye = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, MailContact>
     */
    public function getMailContacts(): Collection
    {
        return $this->mailContacts;
    }

    public function addMailContact(MailContact $mailContact): static
    {
        if (!$this->mailContacts->contains($mailContact)) {
            $this->mailContacts->add($mailContact);
            $mailContact->addContact($this);
        }

        return $this;
    }

    public function removeMailContact(MailContact $mailContact): static
    {
        if ($this->mailContacts->removeElement($mailContact)) {
            $mailContact->removeContact($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MailContact>
     */
    public function getMailContactEnvoye(): Collection
    {
        return $this->mailContactEnvoye;
    }

    public function addMailContactEnvoye(MailContact $mailContactEnvoye): static
    {
        if (!$this->mailContactEnvoye->contains($mailContactEnvoye)) {
            $this->mailContactEnvoye->add($mailContactEnvoye);
            $mailContactEnvoye->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailContactEnvoye(MailContact $mailContactEnvoye): static
    {
        if ($this->mailContactEnvoye->removeElement($mailContactEnvoye)) {
            // set the owning side to null (unless already changed)
            if ($mailContactEnvoye->getExpediteur() === $this) {
                $mailContactEnvoye->setExpediteur(null);
            }
        }

        return $this;
    }
}
