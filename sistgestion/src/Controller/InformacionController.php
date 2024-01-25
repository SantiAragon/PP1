<?php
// src/Controller/InformacionController.php

namespace App\Controller;

use App\Form\BuscarPerfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformacionController extends AbstractController
{
    /**
     * @Route("/informacion", name="informacion_p")
     */
    public function mostrarPerfiles(Request $request): Response
    {
        // Definir un array de perfiles
        $perfiles = [
            ['codigo' => 1, 'nombre' => 'parante', 'linea' => 'Tradicional Plus', 'cantidad' => '10', 'metros' => '8'],
            ['codigo' => 2, 'nombre' => 'contravidrio', 'linea' => 'Tradicional Plus', 'cantidad' => '5', 'metros' => '7'],
            ['codigo' => 3, 'nombre' => 'marco', 'linea' => 'Tradicional Plus', 'cantidad' => '3', 'metros' => '6'],
            // Agrega más perfiles según sea necesario
        ];

        // Crear el formulario de búsqueda
        $form = $this->createForm(BuscarPerfilType::class);
        $form->handleRequest($request);

        // Inicializar el array de perfiles a mostrar
        $perfilesMostrar = [];

        // Procesar el formulario cuando se envía
        if ($form->isSubmitted() && $form->isValid()) {
            // Lógica para filtrar perfiles según el término de búsqueda
            $terminoBusqueda = $form->get('termino_busqueda')->getData();

            // Verificar que se haya proporcionado un término de búsqueda antes de realizar la búsqueda
            if ($terminoBusqueda !== null && $terminoBusqueda !== '') {
                // Filtra los perfiles según el término de búsqueda
                $perfilesMostrar = array_filter($perfiles, function ($perfil) use ($terminoBusqueda) {
                    // Implementa la lógica de búsqueda según tus necesidades
                    // En este ejemplo, se busca en el nombre del perfil
                    return stripos($perfil['nombre'], $terminoBusqueda) !== false;
                });
            }
        }

        // Renderizar la plantilla con el formulario y los resultados de la búsqueda
        return $this->render('informacion.html.twig', [
            'form' => $form->createView(),
            'perfiles' => $perfilesMostrar,
        ]);
    }
}