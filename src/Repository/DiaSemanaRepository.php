<?php

namespace App\Repository;

use App\Entity\DiaSemana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiaSemana|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiaSemana|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiaSemana[]    findAll()
 * @method DiaSemana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiaSemanaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiaSemana::class);
    }

    // /**
    //  * @return DiaSemana[] Returns an array of DiaSemana objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiaSemana
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
