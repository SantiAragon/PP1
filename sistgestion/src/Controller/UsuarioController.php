<?php
// src/Controller/UsuarioController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioController extends AbstractController
{
    private $passwordEncoder;

    // Constructor que recibe el servicio UserPasswordEncoderInterface para codificar contraseñas
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/usuario", name="usuario_p")
     * Función que renderiza la plantilla 'usuario.html.twig'
     */
    public function mostrarUsuario() {
        return $this->render('usuario.html.twig');
    }

    /**
     * @Route("/cambiar-contrasena", name="cambiar_contrasena", methods={"POST"})
     * Método para cambiar la contraseña del usuario
     */
    public function cambiarContrasena(Request $request): Response
    {
        // Obtener el usuario actual
        $user = $this->getUser();

        // Recibir los datos del formulario de cambio de contraseña
        $currentPassword = $request->request->get('current_password');
        $newPassword = $request->request->get('new_password');

        // Verificar si la contraseña actual es válida
        if (!$this->passwordEncoder->isPasswordValid($user, $currentPassword)) {
            // La contraseña actual no es válida, mostrar un mensaje de error
            return $this->render('usuario.html.twig', [
                'error_mensaje_password' => 'La contraseña actual es incorrecta'
            ]);
        }

        // Verificar longitud de la nueva contraseña
        if (strlen($newPassword) < 6) {
            return $this->render('usuario.html.twig', [
                'error_mensaje_password1' => 'La nueva contraseña debe tener al menos 6 caracteres'
            ]);
        }

        // Codificar la nueva contraseña
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $newPassword);

        // Actualizar la contraseña del usuario
        $user->setPassword($encodedPassword);

        // Persistir los cambios en la base de datos
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        // Devolver una respuesta de éxito
        return $this->render('usuario.html.twig', [
            'mensaje_password' => 'Contraseña cambiada con éxito'
        ]);
    }

    /**
     * @Route("/cambiar-email", name="cambiar_email", methods={"POST"})
     * Método para cambiar el email del usuario
     */
    public function cambiarEmail(Request $request): Response
    {
        // Obtener el usuario actual
        $user = $this->getUser();

        // Recibir los datos del formulario de cambio de email
        $currentEmail = $user->getEmail(); // Email actual del usuario
        $newEmail = $request->request->get('new_email'); // Nuevo email desde el formulario

        // Verificar si el nuevo email es diferente al actual
        if ($newEmail === $currentEmail) {
            // El nuevo email es igual al actual, no es necesario hacer cambios
            return $this->render('usuario.html.twig', [
                'mensaje_error_email' => 'El email debe ser diferente al actual'
            ]);
        }

        // Actualizar el email del usuario
        $user->setEmail($newEmail);

        // Persistir los cambios en la base de datos
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        // Devolver una respuesta de éxito
        return $this->render('usuario.html.twig', [
            'mensaje_email' => 'Email cambiado con éxito'
        ]);
    }

    /**
     * @Route("/cambiar-nombre-usuario", name="cambiar_nombre_usuario", methods={"POST"})
     * Método para cambiar el nombre de usuario
     */
    public function cambiarNombreUsuario(Request $request): Response
    {
        // Obtener el usuario actual
        $user = $this->getUser();

        // Recibir los datos del formulario de cambio de nombre de usuario
        $newNombre = $request->request->get('new_nombre');
        $newApellido = $request->request->get('new_apellido');

        // Validar longitud del nombre y apellido
        if (strlen($newNombre) < 3 || strlen($newNombre) > 10 || strlen($newApellido) < 3 || strlen($newApellido) > 10) {
            return $this->render('usuario.html.twig', [
                'error_mensaje_nombre' => 'El nombre y apellido deben tener entre 3 y 10 caracteres'
            ]);
        }

        // Actualizar el nombre y apellido del usuario
        $user->setNombre($newNombre);
        $user->setApellido($newApellido);

        // Persistir los cambios en la base de datos
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        // Devolver una respuesta de éxito
        return $this->render('usuario.html.twig', [
            'mensaje_nombre_usuario' => 'Nombre y apellido cambiados con éxito'
        ]);
    }
}