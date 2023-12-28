<?php
// src/Controller/ProductoController.php

namespace App\Controller;

use App\Categoria\Informacion;
use App\Categoria\Stock;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class GestionController extends AbstractController
{
    /**
     * @Route("/", name="listarCategorias")
     */
    public function listarCategorias(Informacion $info) {
        $categoria= $info->findAll();
        return $this->render('registro.html.twig',['categorias'=>$categoria,]);
    }

    /**
     * @Route("/mostrar-stock/{id}", name="mostrarStock")
     */
    public function mostrarStock($id) {
        return $this->render('templates/stock.html.twig', ['idStock' => $id,]);
    }
}
