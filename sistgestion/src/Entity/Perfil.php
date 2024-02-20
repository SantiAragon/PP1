<?php

namespace App\Entity;

use App\Repository\PerfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerfilRepository::class)]
class Perfil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $codigo = null;

    #[ORM\Column(length: 50)]
    private ?string $linea = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantidad = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagen = null; // Ruta de la imagen PNG

    #[ORM\Column]
    private ?int $metros = null;

    #[ORM\OneToMany(mappedBy: 'perfil', targetEntity: UserPerfil::class, orphanRemoval: true)]
    private Collection $usuarioPerfiles;

    public function __construct()
    {
        $this->usuarioPerfiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): static
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getLinea(): ?string
    {
        return $this->linea;
    }

    public function setLinea(string $linea): static
    {
        $this->linea = $linea;

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

    public function getMetros(): ?int
    {
        return $this->metros;
    }

    public function setMetros(int $metros): static
    {
        $this->metros = $metros;

        return $this;
    }

     public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): static
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * @return Collection<int, UserPerfil>
     */
    public function getUsuarioPerfiles(): Collection
    {
        return $this->usuarioPerfiles;
    }

    public function addUsuarioPerfile(UserPerfil $usuarioPerfile): static
    {
        if (!$this->usuarioPerfiles->contains($usuarioPerfile)) {
            $this->usuarioPerfiles->add($usuarioPerfile);
            $usuarioPerfile->setPerfil($this);
        }

        return $this;
    }

    public function removeUsuarioPerfile(UserPerfil $usuarioPerfile): static
    {
        if ($this->usuarioPerfiles->removeElement($usuarioPerfile)) {
            // set the owning side to null (unless already changed)
            if ($usuarioPerfile->getPerfil() === $this) {
                $usuarioPerfile->setPerfil(null);
            }
        }

        return $this;
    }

}
