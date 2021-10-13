<?php

namespace App\Repository;

use App\Entity\PermisType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PermisType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PermisType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PermisType[]    findAll()
 * @method PermisType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PermisTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PermisType::class);
    }

    // /**
    //  * @return PermisType[] Returns an array of PermisType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PermisType
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
