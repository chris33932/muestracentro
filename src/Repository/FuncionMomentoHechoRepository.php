<?php

namespace App\Repository;

use App\Entity\FuncionMomentoHecho;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FuncionMomentoHecho|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuncionMomentoHecho|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuncionMomentoHecho[]    findAll()
 * @method FuncionMomentoHecho[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuncionMomentoHechoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FuncionMomentoHecho::class);
    }

    // /**
    //  * @return FuncionMomentoHecho[] Returns an array of FuncionMomentoHecho objects
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
    public function findOneBySomeField($value): ?FuncionMomentoHecho
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
