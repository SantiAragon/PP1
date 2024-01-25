<?php

namespace App\Entity;

use App\Repository\UsuarioPerfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioPerfilRepository::class)]
class UsuarioPerfil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUsuario = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantidad = null;

    #[ORM\Column]
    private ?int $idPerfil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): static
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getIdPerfil(): ?int
    {
        return $this->idPerfil;
    }

    public function setIdPerfil(int $idPerfil): static
    {
        $this->idPerfil = $idPerfil;

        return $this;
    }
}
