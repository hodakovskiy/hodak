<?php

declare(strict_types=1);

namespace Hodak\SergeyBlog\User\Dto;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Hodak\SergeyBlog\User\Dto\UserRegistration;
use Hodak\SergeyBlog\Core\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

class UserManager
{

  private $id;

  /**
   * @Assert\NotBlank()
   * @Assert\Email()
   */
  private $email;

  /**
   * @Assert\Length(
   *      min = 5,
   *      max = 4096,
   *      minMessage = "Your first name must be at least {{ limit }} characters long",
   *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
   * )
   */
  private $plainPassword;
  private $password;

  public function getId(): ?int {
    return $this->id;
  }

  public function getEmail(): ?string {
    return $this->email;
  }

  public function getPlainPassword(): ?string {
    return $this->plainPassword;
  }

  public function getPassword(): ?string {
    return $this->password;
  }

  public function setId($id): ?int {
    $this->id = $id;
  }

  public function setEmail($email): ?string {
    $this->email = $email;
  }

  public function setPlainPassword($plainPassword): ?string {
    $this->plainPassword = $plainPassword;
  }

  public function setPassword($password): ?string {
    $this->password = $password;
  }

}
