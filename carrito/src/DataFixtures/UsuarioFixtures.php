<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Usuario;

class UsuarioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 6; $i++) {
            $usuario = new Usuario();
            $usuario->setNombre('usuario'.$i);
            $usuario->setEmail('usuario'.$i.'@gmail.com');
            $usuario->setPassword('$2y$13$lMcpzdiahRBgEsvCBHnCcuZ3UZ.V9.jw6NAdt.8s0KH7QBKrbOXWa');
            $manager->persist($usuario);
            }
                // $product = new Product();
                // $manager->persist($product);
        
                $manager->flush();
            
        }
        // $product = new Product();
        // $manager->persist($product);

    }

