<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $email_educateur = null;

    #[ORM\Column(length: 100)]
    private ?string $mdp_educateur = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Licencie $Licencie = null;

    #[ORM\Column]
    private ?bool $est_admin = null;

    #[ORM\ManyToMany(targetEntity: MailEdu::class, mappedBy: 'educateurs')]
    private Collection $mailEdus;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailEdu::class, orphanRemoval: true)]
    private Collection $mailEnvoye;

    public function __construct()
    {
        $this->mailEdus = new ArrayCollection();
        $this->mailEnvoye = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailEducateur(): ?string
    {
        return $this->email_educateur;
    }

    public function setEmailEducateur(string $email_educateur): static
    {
        $this->email_educateur = $email_educateur;

        return $this;
    }

    public function getMdpEducateur(): ?string
    {
        return $this->mdp_educateur;
    }

    public function setMdpEducateur(string $mdp_educateur): static
    {
        $this->mdp_educateur = $mdp_educateur;

        return $this;
    }

    public function getLicencie(): ?Licencie
    {
        return $this->Licencie;
    }

    public function setLicencie(Licencie $Licencie): static
    {
        $this->Licencie = $Licencie;

        return $this;
    }

    public function isEstAdmin(): ?bool
    {
        return $this->est_admin;
    }

    public function setEstAdmin(bool $est_admin): static
    {
        $this->est_admin = $est_admin;

        return $this;
    }

    /**
     * @return Collection<int, MailEdu>
     */
    public function getMailEdus(): Collection
    {
        return $this->mailEdus;
    }

    public function addMailEdu(MailEdu $mailEdu): static
    {
        if (!$this->mailEdus->contains($mailEdu)) {
            $this->mailEdus->add($mailEdu);
            $mailEdu->addEducateur($this);
        }

        return $this;
    }

    public function removeMailEdu(MailEdu $mailEdu): static
    {
        if ($this->mailEdus->removeElement($mailEdu)) {
            $mailEdu->removeEducateur($this);
        }

        return $this;
    }

    public function getRoles(): array
    {
        // Retourne les rôles de l'utilisateur, par exemple:
        return ['ROLE_USER'];
    }

    public function getPassword(): string
    {
        // Retourne le mot de passe (habituellement hashé)
        return $this->mdp_educateur;
    }

    public function getSalt()
    {
        // Pas nécessaire si vous utilisez un algorithme de hachage moderne
        return null;
    }

    public function getUserIdentifier(): string
    {
      return $this->email_educateur;  
    }

    public function getUsername()
    {
        // Retourne le nom d'utilisateur (dans votre cas, probablement l'email)
        return $this->getUserIdentifier();
    }

    public function eraseCredentials()
    {
        // Utilisé pour effacer les données sensibles de l'objet utilisateur
    }

    /**
     * @return Collection<int, MailEdu>
     */
    public function getMailEnvoye(): Collection
    {
        return $this->mailEnvoye;
    }

    public function addMailEnvoye(MailEdu $mailEnvoye): static
    {
        if (!$this->mailEnvoye->contains($mailEnvoye)) {
            $this->mailEnvoye->add($mailEnvoye);
            $mailEnvoye->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailEnvoye(MailEdu $mailEnvoye): static
    {
        if ($this->mailEnvoye->removeElement($mailEnvoye)) {
            // set the owning side to null (unless already changed)
            if ($mailEnvoye->getExpediteur() === $this) {
                $mailEnvoye->setExpediteur(null);
            }
        }

        return $this;
    }
}
