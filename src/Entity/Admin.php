<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    #[Assert\NotBlank(message: 'Please enter your cin')]
    #[Assert\Positive(message: 'CIN must be a positive number')]
    #[Assert\Length(
        exactMessage: 'CIN must be exactly {{ limit }} digits',
        min: 8,
        max: 8
    )]

    private ?string $cin = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Please enter your name')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'Your name should be at least {{ limit }} characters', maxMessage: 'Your name cannot be longer than {{ limit }} characters')]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Please enter your Last name')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'Your Last name should be at least {{ limit }} characters', maxMessage: 'Your Last name cannot be longer than {{ limit }} characters')]
  
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    #[Assert\Email(message: 'Please enter a valid email')]
    #[Assert\NotBlank(message: 'Please enter your email')]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Please enter Password')]
    #[Assert\Length(min: 6, max: 255, minMessage: 'Your Last Password should be at least {{ limit }} characters', maxMessage: 'YourPassword cannot be longer than {{ limit }} characters')]
    private ?string $pwd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }
}
