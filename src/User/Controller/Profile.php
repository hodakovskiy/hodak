<?php

namespace Hodak\SergeyBlog\User\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

use Hodak\SergeyBlog\User\Mapper\UserManagerDtoMapper;

class Profile extends AbstractController
{
  private $translator;
  private $userManagerDtoMapper;


  public function __construct(TranslatorInterface $translator) {
    $this->translator = $translator;
  }

  /**
     * @Route("/profile", name="sergey_blog_user_profile")
     */
    public function index(): Response
    {
     
    
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'Profile',
        ]);
    }
}
