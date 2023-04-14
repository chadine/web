<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[UniqueEntity(fields: ['mail'], message: 'There is already an account with this mail')]
class Client implements UserInterface , PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Id_client = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Please enter your name')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'Your name should be at least {{ limit }} characters', maxMessage: 'Your name cannot be longer than {{ limit }} characters')]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Please enter your Last name')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'Your Last name should be at least {{ limit }} characters', maxMessage: 'Your Last name cannot be longer than {{ limit }} characters')]
   
    private ?string $prenom = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Please enter your phone number')]
    #[Assert\Positive(message: 'phone number must be a positive number')]
    #[Assert\Length(
        exactMessage: 'phone number must be exactly {{ limit }} digits',
        min: 8,
        max: 8
    )]
    private ?string $num_tel = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Please enter your Location')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'Your Location should be at least {{ limit }} characters', maxMessage: 'Your Location cannot be longer than {{ limit }} characters')]
   
    private ?string $adresse = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Please enter your Gender')]

    private ?string $sexe = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter your email')]
    #[Assert\Email(message: 'Please enter a valid email')]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter Password')]
    #[Assert\Length(min: 6, max: 255, minMessage: 'Your Last Password should be at least {{ limit }} characters', maxMessage: 'Your Password cannot be longer than {{ limit }} characters')]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?int
    {
        return $this->Id_client;
    }

    public function setIdClient(int $Id_client): self
    {
        $this->Id_client = $Id_client;

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

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getUserIdentifier(): string
    {
        return (string) $this->mail;
    }
    public function getUsername(): ?string
{
    return $this->mail;
}
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt(): ?string
    {
        return null;
    }
    public function eraseCredentials()
    {
        // do nothing
    }
}
