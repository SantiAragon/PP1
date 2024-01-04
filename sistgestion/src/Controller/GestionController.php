<?php
// src/Controller/ProductoController.php

namespace App\Controller;

use App\Categoria\Informacion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class GestionController extends AbstractController
{
    /**
     * @Route("/princ", name="listarCategorias")
     */
    public function listarCategorias(Informacion $info): Response {
        $categoria= $info->findAll();
        return $this->render('registro.html.twig',['categorias'=>$categoria,]);
    }
}
