<?php

namespace App\Repository;

use App\Entity\JourDispo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JourDispo|null find($id, $lockMode = null, $lockVersion = null)
 * @method JourDispo|null findOneBy(array $criteria, array $orderBy = null)
 * @method JourDispo[]    findAll()
 * @method JourDispo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JourDispoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JourDispo::class);
    }

    // /**
    //  * @return JourDispo[] Returns an array of JourDispo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JourDispo
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
