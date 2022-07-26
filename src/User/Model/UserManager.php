<?php

declare(strict_types=1);

namespace Hodak\SergeyBlog\User\Model;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Hodak\SergeyBlog\User\Dto\UserRegistrationDto;
use Hodak\SergeyBlog\Core\Entity\User;

class UserManager
{

  private PasswordHasherFactoryInterface $passwordHasherFactory;
  private EntityManagerInterface $em;

  public function __construct(
      PasswordHasherFactoryInterface $passwordHasherFactory,
      EntityManagerInterface $em
  ) {
    $this->passwordHasherFactory = $passwordHasherFactory;
    $this->em = $em;
  }

  public function create(UserRegistrationDto $dto): User {

    $password = $this->getHashedPassword($dto->getPlainPassword());
    
    $user = new User;
    $user->setEmail($dto->getEmail());
    $user->setPassword($password);
    $this->em->persist($user);
    $this->em->flush();

    return $user;
  }

  private function getHashedPassword(string $plainPassword): string {
    return $this->passwordHasherFactory->getPasswordHasher(User::class)
            ->hash($plainPassword)
    ;
  }

}
