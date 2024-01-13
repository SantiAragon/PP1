<?php
// src/Controller/UsuarioController.php

namespace App\Controller;

use App\Categoria\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", name="usuario_p")
     */
    public function mostrarUsuario() {
        return $this->render('usuario.html.twig');
    }
}