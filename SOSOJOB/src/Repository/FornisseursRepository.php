<?php

namespace App\Repository;

use App\Entity\Fornisseurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fornisseurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fornisseurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fornisseurs[]    findAll()
 * @method Fornisseurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FornisseursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fornisseurs::class);
    }

    // /**
    //  * @return Fornisseurs[] Returns an array of Fornisseurs objects
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
    public function findOneBySomeField($value): ?Fornisseurs
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
