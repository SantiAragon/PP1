<?php
// src/Controller/AgregarController.php

namespace App\Controller;

use App\Entity\Perfil;
use App\Entity\Producto;
use App\Categoria\Agregar;
use App\Entity\UserPerfil;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AgregarController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("agregar", name="agregar_p")
     */
    public function cargarPerfiles(Request $request): Response
    {
        // Si el formulario ha sido enviado
        if ($request->isMethod('POST')) {
            // Obtener los datos del formulario
            $nombre = $request->request->get('nombre');
            $codigo = $request->request->get('codigo');
            $linea = $request->request->get('linea');
            $cantidad = $request->request->get('cantidad');
            $metros = $request->request->get('metros');
            // Obtener el usuario actual
            $user = $this->getUser();
            // Crear una nueva instancia de Perfil
            $perfil = new Perfil();
            $perfil->setNombre($nombre);
            $perfil->setCodigo($codigo);
            $perfil->setLinea($linea);
            $perfil->setCantidad($cantidad);
            $perfil->setMetros($metros);
            $userperfil = new UserPerfil();
            $userperfil->setPerfil($perfil); // Asignar el perfil al UserPerfil
            // Asociar el perfil al usuario actual
            $user->addPerfil($userperfil);
            // Obtener el EntityManager y persistir los datos en la base de datos
            $this->entityManager->persist($perfil);
            $this->entityManager->flush();
            // Redirigir a alguna página de confirmación o a la página de inicio
            return $this->render('agregar.html.twig');
        }
        // Renderizar la página Twig para cargar perfiles
        return $this->render('agregar.html.twig');
    }
    }
