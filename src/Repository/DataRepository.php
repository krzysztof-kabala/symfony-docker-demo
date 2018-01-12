<?php

namespace App\Repository;

use App\Entity\Data;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Data::class);
    }

    public function save(Data $data)
    {
        try {
            $this->getEntityManager()->persist($data);
            $this->getEntityManager()->flush();
        } catch (OptimisticLockException|ORMException $e) {
        }
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('d')
            ->where('d.something = :value')->setParameter('value', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
