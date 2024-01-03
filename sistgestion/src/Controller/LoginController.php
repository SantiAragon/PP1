<?php
// src/Controller/LoginController.php

namespace App\Controller;

use App\Categoria\Login;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login_p")
     */
    public function mostrarLogin() {
        return $this->render('login.html.twig');
    }
}