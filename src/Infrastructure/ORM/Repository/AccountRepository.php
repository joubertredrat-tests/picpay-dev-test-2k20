<?php

declare(strict_types=1);

namespace App\Infrastructure\ORM\Repository;

use App\Infrastructure\ORM\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccountRepository extends ServiceEntityRepository implements AccountRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Account::class);
    }

    public function add(Account $account): Account
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($account);
        $entityManager->flush();

        return $account;
    }

    public function update(Account $account): Account
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($account);
        $entityManager->flush($account);

        return $account;
    }

    public function get(string $uuid): ?Account
    {
        return $this->find($uuid);
    }
}
