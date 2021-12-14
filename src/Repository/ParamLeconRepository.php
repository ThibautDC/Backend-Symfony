<?php

namespace App\Repository;

use App\Entity\ParamLecon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParamLecon|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParamLecon|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParamLecon[]    findAll()
 * @method ParamLecon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParamLeconRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParamLecon::class);
    }

    // /**
    //  * @return ParamLecon[] Returns an array of ParamLecon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParamLecon
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
