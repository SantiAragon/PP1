<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\PerfilRepository;
use App\Form\PerfilEditMetrosType;
use App\Form\PerfilEditCantidadType; // Asegúrate de importar el formulario adecuado
use App\Form\PerfilEditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PerfilSearchType;

class BuscarPerfilController extends AbstractController
{
    #[Route('/buscar_perfil', name: 'buscar_perfil')]
    public function buscarPerfil(Request $request, PerfilRepository $perfilRepository): Response
    {
        // Obtener el usuario actualmente autenticado
        $usuario = $this->getUser();

        // Verificar si el usuario está autenticado
        if (!$usuario) {
            // Redirigir al usuario a la página de inicio de sesión si no está autenticado
            return $this->redirectToRoute('app_login');
        }

        // Crear el formulario de búsqueda
        $form = $this->createForm(PerfilSearchType::class);

        // Manejar la solicitud del formulario
        $form->handleRequest($request);

        // Verificar si el formulario ha sido enviado y es válido
        if ($form->isSubmitted() && $form->isValid()) {
            // Obtener los datos del formulario
            $data = $form->getData();

            // Obtener el código del perfil desde los datos del formulario
            $codigo = $data['codigo'];

            // Buscar todos los perfiles asociados al código proporcionado
            $perfiles = $perfilRepository->findBy(['codigo' => $codigo]);

            // Verificar si se encontraron perfiles
            if (empty($perfiles)) {
                // Si no se encontraron perfiles, mostrar un mensaje de error
                return $this->render('perfil/perfil.html.twig', [
                    'mensaje_error_perfil' => 'No se encontraron perfiles con ese codigo', 'form' => $form->createView(),
                ]);
            }

            // Verificar si alguno de los perfiles pertenece al usuario actual
            $perfilesEncontrados = [];
            foreach ($perfiles as $perfil) {
                $userPerfiles = $perfil->getUsuarioPerfiles();
                foreach ($userPerfiles as $userPerfil) {
                    if ($userPerfil->getUsuario() === $usuario) {
                        // Si el perfil pertenece al usuario actual, se almacena
                        $perfilesEncontrados[] = $perfil;
                        break;
                    }
                }
            }

            if (empty($perfilesEncontrados)) {
                // Si no se encontró un perfil que pertenezca al usuario actual, mostrar un mensaje de error
                return $this->render('perfil/perfil.html.twig', [
                    'mensaje_error_perfil1' => 'Se encontraron perfiles, pero no pertenecen al usuario actual', 'form' => $form->createView(),
                ]);
            }

            // Renderizar la plantilla con los perfiles encontrados
            return $this->render('perfil/perfil.html.twig', [
                'perfiles' => $perfilesEncontrados,
                'form' => $form->createView(),
            ]);
        }

        // Renderizar la plantilla con el formulario
        return $this->render('perfil/perfil.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/perfil/{id}/editar', name: 'perfil_editar')]
    public function editarPerfil(Request $request, PerfilRepository $perfilRepository, $id): Response
    {
        // Obtén el perfil por su ID
        $perfil = $perfilRepository->find($id);

        // Verifica si el perfil existe
        if (!$perfil) {
            throw $this->createNotFoundException('El perfil no fue encontrado.');
        }

        // Crea el formulario de edición unificado para metros y cantidad
        $form = $this->createForm(PerfilEditType::class, $perfil);

        // Maneja la solicitud del formulario
        $form->handleRequest($request);

        // Verifica si el formulario ha sido enviado y es válido
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste los cambios en la base de datos
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            // Redirige a la página de búsqueda de perfiles
            return $this->redirectToRoute('buscar_perfil');
        }

        // Renderiza la plantilla con el formulario de edición unificado
        return $this->render('perfil/editar_perfil.html.twig', [
            'form' => $form->createView(),
            'perfil' => $perfil, // Pasa el perfil a la plantilla
        ]);
    }
}
