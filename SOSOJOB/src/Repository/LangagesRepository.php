<?php

namespace App\Repository;

use App\Entity\InfosLangages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfosLangages|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfosLangages|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfosLangages[]    findAll()
 * @method InfosLangages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LangagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfosLangages::class);
    }

    // /**
    //  * @return InfosLangages[] Returns an array of InfosLangages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfosLangages
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
