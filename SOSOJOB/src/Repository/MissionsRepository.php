<?php


namespace App\Repository;

use App\Entity\MissionsAttr;
use App\Entity\Missions;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * @method MissionsAttr|null find($id, $lockMode = null, $lockVersion = null)
 * @method MissionsAttr|null findOneBy(array $criteria, array $orderBy = null)
 * @method MissionsAttr[]    findAll()
 * @method MissionsAttr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MissionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Missions::class);
    }


    /**
     * @return mixed
     */
    public function showMissionM($idClients)
    {

        $queryBuilder = $this
            ->createQueryBuilder('r')


            ->andWhere('r.idClient=:idclient')
            ->andWhere('r.etat=:etat')

            ->setParameter('idclient', $idClients)
            ->setParameter('etat','attr');

        $query = $queryBuilder->getQuery();


        return $query->getResult();
        dump($query);
    }


}