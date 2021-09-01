<?php

namespace App\Repository;

use App\Entity\FranjaHoraria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FranjaHoraria|null find($id, $lockMode = null, $lockVersion = null)
 * @method FranjaHoraria|null findOneBy(array $criteria, array $orderBy = null)
 * @method FranjaHoraria[]    findAll()
 * @method FranjaHoraria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FranjaHorariaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FranjaHoraria::class);
    }

    // /**
    //  * @return FranjaHoraria[] Returns an array of FranjaHoraria objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FranjaHoraria
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
