<?php

namespace App\Repository;

use App\Entity\SimpleDirectory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SimpleDirectory>
 *
 * @method SimpleDirectory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimpleDirectory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimpleDirectory[]    findAll()
 * @method SimpleDirectory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimpleDirectoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimpleDirectory::class);
    }

//    /**
//     * @return SimpleDirectory[] Returns an array of SimpleDirectory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SimpleDirectory
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
