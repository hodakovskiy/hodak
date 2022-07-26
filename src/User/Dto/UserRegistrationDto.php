<?php

namespace Hodak\SergeyBlog\User\Dto;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Hodak\SergeyBlog\User\Validator\UniqueEmail;
/**
 * Description of userRegisterOutputDto
 * @author sergey
 */
class UserRegistrationDto implements UserInterface, PasswordAuthenticatedUserInterface
{

  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")

   */
  private $id;

  /**
   * @var string
   * 
   * @ORM\Column(type="string", length=180, unique=true)
   * 
   * @Assert\NotBlank()
   * @Assert\Email()
   * @UniqueEmail()
   */
  private $email;

  /**
   * @var string
   * 
   * @Assert\Length(
   *      min = 5,
   *      max = 4096,
   *      minMessage = "Your first name must be at least {{ limit }} characters long",
   *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
   * )
   */
  private $plainPassword;
  private $password;

  /**
   * @var array
   *
   * @ORM\Column(type="json")
   */
  private $roles = [];

  public function getId() {
    return $this->id;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function getPlainPassword(): string {
    return $this->plainPassword;
  }

  public function getPassword(): string {
    return $this->password;
  }

  public function getRoles(): array {
    return $this->roles;
  }

  public function setEmail(string $email): self {
    $this->email = $email;
    return $this;
  }

  public function setPlainPassword(string $plainPassword): self {
    $this->plainPassword = $plainPassword;
    return $this;
  }

  public function setPassword(string $password): self {
    $this->password = $password;
    return $this;
  }

  public function setRoles(array $roles): void {
    $this->roles = $roles;
  }

  public function eraseCredentials() {
    
  }

  public function getSalt() {
    
  }

  public function getUsername(): string {
    
  }

}
