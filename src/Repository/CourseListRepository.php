<?php

namespace App\Repository;

use App\Entity\CourseList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseList|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseList|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseList[]    findAll()
 * @method CourseList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseList::class);
    }

    // /**
    //  * @return CourseList[] Returns an array of CourseList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CourseList
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
