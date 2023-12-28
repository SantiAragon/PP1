<?php
// src/Controller/ProductoController.php

namespace App\Controller;

use App\Categoria\Stock;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Producto;


class StockController extends AbstractController
{
    /**
     * @Route("/stockp", name="stock_p")
     */
    public function mostrarStock(): Response {
        return $this->render('templates/stock.html.twig');
    }
}