<?php

namespace App\Repository;

use App\Entity\JoursDisponible;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JoursDisponible|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoursDisponible|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoursDisponible[]    findAll()
 * @method JoursDisponible[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class
TableauDisponibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoursDisponible::class);
    }

    // /**
    //  * @return JoursDisponible[] Returns an array of JoursDisponible objects
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
    public function findOneBySomeField($value): ?JoursDisponible
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
