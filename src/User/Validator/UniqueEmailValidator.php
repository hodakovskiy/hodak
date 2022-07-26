<?php

namespace Hodak\SergeyBlog\User\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Hodak\SergeyBlog\Core\Repository\UserRepository;

class UniqueEmailValidator extends ConstraintValidator
{

  private $userRepository;

  public function __construct(UserRepository $userRepository) {
    $this->userRepository = $userRepository;
  }

  public function validate($email, Constraint $constraint) {
    /* @var $constraint \Hodak\SergeyBlog\User\Validator\UniqueEmail */

    if (null === $email || '' === $email) {
      return;
    }

    $existingUser = $this->userRepository->findOneBy([
      'email' => $email
    ]);
    
    
    if (!empty($existingUser)) {
          $this->context->buildViolation($constraint->message)
        ->setParameter('{{ value }}', $email)
        ->addViolation();
    }

    
    return true;
  }

}
