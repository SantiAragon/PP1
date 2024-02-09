<?php

namespace App\Repository;

use App\Entity\UserPerfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserPerfil>
 *
 * @method UserPerfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPerfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPerfil[]    findAll()
 * @method UserPerfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPerfilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserPerfil::class);
    }

//    /**
//     * @return UserPerfil[] Returns an array of UserPerfil objects
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

//    public function findOneBySomeField($value): ?UserPerfil
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
