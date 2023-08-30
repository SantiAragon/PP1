<?php
namespace App\Negocio;
class Almacen 
{
    /**
    * @Route("/", name="almacen")
    */
    private $productos;
    public function __construct(){
        $this->productos=[
        0 => [
            'id' => 1,
            'nombre' => 'Coca cola',
            'descripcion' =>'Bebida',
            'precio' => 101,
            'imagen' => 'images/coca.png',
        ],
        1 => [
            'id' => 2,
            'nombre' => 'Fanta',
            'descripcion' => 'Bebida',
            'precio' => 102,
            'imagen' => 'images/fanta.png',
        ],
        2 => [
            'id' => 3,
            'nombre' => 'Lays',
            'descripcion' => 'Comida',
            'precio' => 103,
            'imagen' => 'images/lays.jpg',
        ],
        3 => [
            'id' => 4,
            'nombre' => 'Oreos',
            'descripcion' => 'Comida',
            'precio' => 102,
            'imagen' => 'images/oreo.jpg',
        ],
    ];
    }
        
    public function findAll() {
       return $this->productos;
    }

    public function findId($id){
        return $this->productos[$id] ?? null;
    }
}
?>