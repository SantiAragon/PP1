<?php
namespace App\Controller;

use App\Negocio\Almacen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuario;
use Doctrine\Persistence\ManagerRegistry;

class ProductoController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function listarProductos(ManagerRegistry $registry): Response
    {
        $productoRepository = $registry->getRepository(Producto::class);
        $productos = $productoRepository->findAll();
        return $this->render('producto/lista.html.twig', ['productos'=>$productos,]);
    }

     /**
     * @Route("/producto/{id}", name="detalleProducto")
     */

    public function detalleProducto(Almacen $almacen, $id): Response
    {
        $producto = $almacen->findId($id);
        return $this->render('producto/detalle.html.twig', ['producto'=>$producto,]);
    }
}
?>