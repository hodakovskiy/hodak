<?php

namespace Hodak\SergeyBlog\User\Mapper;

/**
 * Description of userRegisterEntityToOutputDtoMapper
 *
 * @author sergey
 */
use Hodak\SergeyBlog\User\Dto\UserRegistrationDto;
use Hodak\SergeyBlog\Core\Entity\User;

class UserManagerDtoMapper
{

  public function __invoke(User $user, ?UserRegistrationDto $target = null): UserRegistrationDto {
    if (!$target) {
      $target = new userRegisterOutputDto();
    }

    $target->setId($user->getId());
    $target->setEmail($user->getEmail());
    $target->setPassword($user->getPassword());
    $target->setPlainPassword($user->getPassword());

    return $target;
  }

}
