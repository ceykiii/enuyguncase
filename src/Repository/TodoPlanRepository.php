<?php

namespace App\Repository;

use App\Entity\TodoPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TodoPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method TodoPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method TodoPlan[]    findAll()
 * @method TodoPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TodoPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TodoPlan::class);
    }

    // /**
    //  * @return TodoPlan[] Returns an array of TodoPlan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TodoPlan
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
