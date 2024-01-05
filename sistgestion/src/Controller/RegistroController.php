<?php
// src/Controller/RegistroController.php

namespace App\Controller;

use App\Categoria\Registro;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class RegistroController extends AbstractController
{
    /**
     * @Route("/registro", name="registro_p")
     */
    public function mostrarRegistro() {
        return $this->render('registro.html.twig');
    }
}