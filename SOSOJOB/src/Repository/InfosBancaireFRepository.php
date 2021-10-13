<?php

namespace App\Repository;

use App\Entity\InfosBancairesF;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfosBancairesF|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfosBancairesF|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfosBancairesF[]    findAll()
 * @method InfosBancairesF[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosBancaireFRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfosBancairesF::class);
    }

    // /**
    //  * @return InfosBancairesF[] Returns an array of InfosBancairesF objects
    //  */
    
    public function findByIdFournisseur($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.idFournisseur = :val')
            ->setParameter('val', $value)
            ->orderBy('i.idBancairesF', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?InfosBancairesF
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
