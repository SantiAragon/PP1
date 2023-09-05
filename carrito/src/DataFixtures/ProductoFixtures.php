<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $producto = new Producto();
        $producto ->setNombre('Producto'.$i);
        $producto ->setDescripcion('Comestible');
        $producto ->setPrecio(mt_rand(10, 100));
        $producto ->setImagen('images/producto.jpg'.$i.'.jpg');
        manager->persist($producto);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
