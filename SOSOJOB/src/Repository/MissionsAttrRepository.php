<?php

namespace App\Repository;

use App\Entity\MissionsAttr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * @method MissionsAttr|null find($id, $lockMode = null, $lockVersion = null)
 * @method MissionsAttr|null findOneBy(array $criteria, array $orderBy = null)
 * @method MissionsAttr[]    findAll()
 * @method MissionsAttr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MissionsAttrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MissionsAttr::class);
    }



/*    public function showMissionAttr($idClients)
    {
        $queryBuilder = $this
            ->createQueryBuilder('m')
            ->leftJoin('m.idMissionsAttr', 'attr')
            ->orderBy('m.idMissionsAttr')

            ->where('m.idClient=:idclient')
            ->setParameter('idclient', $idClients);


        $query = $queryBuilder->getQuery();


        return $query->getResult();
    }*/
//
// idMissions, objetMissions (titre)
// nomContact,prenomContact,telContact,emailContact,adresse,
//

//tABLE MISSION
// DateDebutMission,DateFinMission,nb_Heures,commentaire


    public function showMissionAttr($idClients)
    {
        $queryBuilder = $this
            ->createQueryBuilder('m')
            ->andWhere('m.idClient=:idclient')
            ->setParameter('idclient',$idClients);


        $query = $queryBuilder->getQuery();


        return $query->getResult();
    }


    /** * Liste des missions attribués en fonction du fournisseur *
     * @param [type] $value
     * @return void
     */
    public function findByFournisseur($value) {
        return $this->createQueryBuilder('m')
            ->andWhere('m.idFournisseur = :val')
            ->setParameter('val', $value)
            ->orderBy('m.idMissionsAttr', 'ASC')
            ->getQuery()
            ->getResult() ;
    }


}
