<?php

namespace Hodak\SergeyBlog\User\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Hodak\SergeyBlog\User\Form\RegistrationForm;
use Hodak\SergeyBlog\User\Dto\UserRegistrationDto;
use Hodak\SergeyBlog\Core\Entity\User;
use Hodak\SergeyBlog\User\Model\UserManager;

class Registration extends AbstractController
{

  public function __construct(UserManager $userManager) {
    $this->userManager = $userManager;
  }

  private UserManager $userManager;

  /**
   * @Route("/registration", name="sergey_blog_user_registration")
   */
  public function index(Request $request): Response {

    $userDto = new UserRegistrationDto();
   
    $form = $this->createForm(RegistrationForm::class, $userDto);

    
    
    $form->handleRequest($request);

    
    if ($form->isSubmitted() && $form->isValid()) {

      $userDto = $form->getData();
      $this->userManager->create($userDto);

      return $this->redirectToRoute('homepage');
    }


    return $this->render('user/registration.html.twig', [
          'form' => $form->createView(),
    ]);
  }

}
