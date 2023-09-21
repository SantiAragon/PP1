<?php
namespace App\Categoria;

class Stock
{
    private $categorias;

    public function __construct()
    {
        $this->categorias();
    }

        public function agregarStock($stock)
    {
        $categorias->add($stock);
    }

    public function mostrarStock()
    {
        return $this->categorias;
    }

    }