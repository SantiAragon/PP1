<?php
// src/Controller/UsuarioController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", name="usuario_p")
     */
    public function mostrarUsuario() {
        return $this->render('usuario.html.twig');
    }
}