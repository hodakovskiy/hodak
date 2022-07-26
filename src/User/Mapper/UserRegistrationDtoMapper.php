<?php

namespace Hodak\SergeyBlog\User\Mapper;

/**
 * @author Sergey Hodakovskiy <hodakovskiy@gmail.com>
 */
class UserRegistrationDtoMapper
{
   public function __invoke(AdType $source, ?AdTypeOutputDto $target = null): AdTypeOutputDto
    {
        if (!$target) {
            $target = new AdTypeOutputDto();
        }

        $target
            ->setId($source->getId())
            ->setExternalId($source->getExternalId())
            ->setName($source->getName())
            ->setPriority($source->getPriority())
            ->setTemplate($source->getTemplate())
        ;

        return $target;
    }
}
