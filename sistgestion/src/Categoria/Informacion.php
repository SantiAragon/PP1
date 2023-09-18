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
                'nombre' => 'Editar',
                'descripcion' => 'Editar informacion',
            ],
            4 => [
                'id' => 3,
                'nombre' => 'Historial',
                'descripcion' => 'Visualizar historial',
            ],
            5 => [
                'id' => 4,
                'nombre' => 'Usuario',
                'descripcion' => 'Editar perfil',
            ],
            6 => [
              'id' => 5,
                'nombre' => 'Agregar',
                'descripcion' => 'Agregar un nuevo perfil',
            ]];
        }

        public function findAll()
    {
        return $this->categorias;
    }
    }