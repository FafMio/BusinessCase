<?php

namespace App\Repository;

use App\Entity\Finish;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Finish|null find($id, $lockMode = null, $lockVersion = null)
 * @method Finish|null findOneBy(array $criteria, array $orderBy = null)
 * @method Finish[]    findAll()
 * @method Finish[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinishRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Finish::class);
    }

    // /**
    //  * @return Finish[] Returns an array of Finish objects
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
    public function findOneBySomeField($value): ?Finish
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
