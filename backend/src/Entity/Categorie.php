<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_categorie = null;

    #[ORM\Column(length: 10)]
    private ?string $code_categorie = null;

    #[ORM\OneToMany(mappedBy: 'Categorie', targetEntity: Licencie::class)]
    private $licencies;

    public function __construct()
    {
        $this->licencies = new ArrayCollection();
    }

    /**
     * @return Collection|Licencie[]
     */
    public function getLicencies(): Collection
    {
        return $this->licencies;
    }

    public function addLicencie(Licencie $licencie): self
    {
        if (!$this->licencies->contains($licencie)) {
            $this->licencies[] = $licencie;
            $licencie->setCategorie($this);
        }

        return $this;
    }

    public function removeLicencie(Licencie $licencie): self
    {
        if ($this->licencies->removeElement($licencie)) {
            // set the owning side to null (unless already changed)
            if ($licencie->getCategorie() === $this) {
                $licencie->setCategorie(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie): static
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    public function getCodeCategorie(): ?string
    {
        return $this->code_categorie;
    }

    public function setCodeCategorie(string $code_categorie): static
    {
        $this->code_categorie = $code_categorie;

        return $this;
    }
}
