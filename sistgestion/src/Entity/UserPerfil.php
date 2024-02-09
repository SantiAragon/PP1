<?php

namespace App\Entity;

use App\Repository\UserPerfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: UserPerfilRepository::class)]
#[Broadcast]
class UserPerfil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'perfiles')]
    private User $usuario;

    #[ORM\ManyToOne(targetEntity: Perfil::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Perfil $perfil = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User<int, User>
     */
    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPerfil(): ?Perfil
    {
        return $this->perfil;
    }

    public function setPerfil(?Perfil $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }
}
