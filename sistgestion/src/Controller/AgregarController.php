<?php
// src/Controller/AgregarController.php

namespace App\Controller;

use App\Categoria\Agregar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class AgregarController extends AbstractController
{
    /**
     * @Route("/Agregar", name="Agregar_p")
     */
    public function mostrarAgregar() {
        return $this->render('agregar.html.twig');
    }
}