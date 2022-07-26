<?php

namespace Hodak\SergeyBlog\Core\Entity;

use Hodak\SergeyBlog\Core\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=180, unique=true)
   */
  private $email;

  /**
   * @var string The hashed password
   * @ORM\Column(type="string")
   */
  private $password;

  /**
   * @var array
   *
   * @ORM\Column(type="json")
   */
  private $roles = [];
  
  public function getId(): ?int {
    return $this->id;
  }

  public function getEmail(): ?string {
    return $this->email;
  }

  public function setEmail(string $email): self {
    $this->email = $email;

    return $this;
  }

  /**
   * A visual identifier that represents this user.
   *
   * @see UserInterface
   */
  public function getUserIdentifier(): string {
    return (string) $this->email;
  }

  /**
   * @deprecated since Symfony 5.3, use getUserIdentifier instead
   */
  public function getUsername(): string {
    return (string) $this->email;
  }

  /**
   * @see PasswordAuthenticatedUserInterface
   */
  public function getPassword(): string {
    return $this->password;
  }

  public function setPassword(string $password): self {
    $this->password = $password;

    return $this;
  }

  /**
   * Returns the roles or permissions granted to the user for security.
   */
  public function getRoles(): array {
    $roles = $this->roles;

    // guarantees that a user always has at least one role for security
    if (empty($roles)) {
      $roles[] = 'ROLE_USER';
    }

    return array_unique($roles);
  }

  public function setRoles(array $roles): void {
    $this->roles = $roles;
  }

  /**
   * Returning a salt is only needed, if you are not using a modern
   * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
   *
   * @see UserInterface
   */
  public function getSalt(): ?string {
    return null;
  }

  /**
   * @see UserInterface
   */
  public function eraseCredentials() {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }

}
