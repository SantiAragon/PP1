<?php

namespace App\Repository;

use App\Entity\UsuarioPerfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsuarioPerfil>
 *
 * @method UsuarioPerfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioPerfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioPerfil[]    findAll()
 * @method UsuarioPerfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioPerfilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioPerfil::class);
    }

//    /**
//     * @return UsuarioPerfil[] Returns an array of UsuarioPerfil objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsuarioPerfil
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
