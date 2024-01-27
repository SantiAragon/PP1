<?php
// src/Controller/RegistroController.php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends AbstractController
{
    /**
     * @Route("/registro", name="registro_p")
     */
    public function mostrarRegistro(Request $request): Response
    {
        // Crear una nueva instancia de la entidad Usuario
        $usuario = new Usuario();

        // Crear el formulario
        $form = $this->createFormBuilder($usuario)
            ->add('nombre')
            ->add('apellido')
            ->add('email')
            ->add('password') // Cambiado de 'contraseña' a 'password'
            ->getForm();

        // Manejar la solicitud del formulario
        $form->handleRequest($request);

        // Verificar si el formulario se ha enviado y es válido
        if ($form->isSubmitted() && $form->isValid()) {
            // Obtener los datos del formulario
            $usuario = $form->getData();

            // Persistir la entidad en la base de datos
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            // Redirigir a una página de éxito o hacer algo más
            return $this->redirectToRoute('listarCategorias');
        }

        // Renderizar el formulario
        return $this->render('registro.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}