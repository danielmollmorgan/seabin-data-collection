<?php

namespace App\Repository;

use App\Entity\MeasurementMeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MeasurementMeta|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeasurementMeta|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeasurementMeta[]    findAll()
 * @method MeasurementMeta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeasurementMetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeasurementMeta::class);
    }

    // /**
    //  * @return MeasurementMeta[] Returns an array of MeasurementMeta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MeasurementMeta
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
