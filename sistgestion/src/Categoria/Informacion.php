<?php
namespace App\Categoria;

class Informacion
{
    private $categorias;

    public function __construct()
    {
        $this->categorias = [
            1 => [
                'id' => 0,
                'nombre' => 'Stock',
                'descripcion' => 'Visualizar lista de stock',
            ],
            2 => [
                'id' => 1,
                'nombre' => 'Informacion',
                'descripcion' => 'Visualizar informacion',
            ],
            3 => [
              'id' => 2,
                'nombre' => 'Agregar',
                'descripcion' => 'Agregar un nuevo perfil',
            ]];
        }

        public function findAll()
    {
        return $this->categorias;
    }
    }