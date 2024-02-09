<?php
// src/Controller/StockController.php

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
    public function mostrarStock(): Response
    {
        $perfiles = null;
        // Obtén el usuario actual
        $usuario = $this->getUser();
        if ($usuario !== null) {
            // Obtiene los perfiles del usuario
            $perfiles = $usuario->getUsuarioPerfiles();
            // Haz algo con los perfiles...
        } else {
            // Manejo del caso en que $usuario es null
        }

        return $this->render('stock.html.twig', [
            'perfiles' => $perfiles,
        ]);
    }
}