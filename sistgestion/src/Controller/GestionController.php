<?php
// src/Controller/ProductoController.php

namespace App\Controller;

use App\Entity\User;
use App\Categoria\Informacion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class GestionController extends AbstractController
{

    /**
     * @Route("/princ", name="listarCategorias")
     */
    public function listarCategorias(Informacion $info): Response {
        $categoria= $info->findAll();
        return $this->render('principal.html.twig',['categorias'=>$categoria]);
    }
}
