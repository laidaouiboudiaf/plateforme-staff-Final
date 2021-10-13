<?php

namespace App\Repository;

use App\Entity\Fournisseur;
use App\Entity\InfosFormations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfosFormations|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfosFormations|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfosFormations[]    findAll()
 * @method InfosFormations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosFormationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfosFormations::class);
    }

    // /**
    //  * @return InfosFormations[] Returns an array of InfosFormations objects
    //  */
    
    public function findByFournisseur($value)
    {
        return $this->createQueryBuilder('j')
            ->innerJoin('App\Entity\Fournisseur', 'f', 'WITH', 'f.idFournisseur = j.idFournisseur')
            ->andWhere('j.idFournisseur = :val')
            ->setParameter('val', $value)
            ->orderBy('j.idFormations', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?InfosFormations
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
