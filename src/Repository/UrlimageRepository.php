<?php

namespace App\Repository;

use App\Entity\Urlimage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Urlimage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Urlimage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Urlimage[]    findAll()
 * @method Urlimage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlimageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Urlimage::class);
    }

    // /**
    //  * @return Urlimage[] Returns an array of Urlimage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Urlimage
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
