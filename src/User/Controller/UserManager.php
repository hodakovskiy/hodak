<?php

namespace Hodak\SergeyBlog\User\Controller;

/**
 * Description of UserManager
 *
 * @author Sergey Hodakovskiy <hodakovskiy@gmail.com>
 */
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Hodak\SergeyBlog\Core\User\Dto\UserRegistration;
use Hodak\SergeyBlog\Core\Core\Entity\User;

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

  public function create(UserRegistration $dto): User {
    $password = $this->getHashedPassword($dto->getPlainPassword());
    $user = new User($dto->getEmail(), $password);
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
