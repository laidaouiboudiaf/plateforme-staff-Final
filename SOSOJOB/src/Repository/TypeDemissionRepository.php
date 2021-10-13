<?php

namespace App\Repository;

use App\Entity\TypeDemission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeDemission|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDemission|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDemission[]    findAll()
 * @method TypeDemission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDemissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeDemission::class);
    }

    // /**
    //  * @return TypeDemission[] Returns an array of TypeDemission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeDemission
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
