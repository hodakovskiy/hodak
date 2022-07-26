<?php

namespace Hodak\SergeyBlog\Security\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class Login extends AbstractController
{

  /**
   * @Route("/login", name="sergey_blog_user_login")
   */
  public function index(AuthenticationUtils $authenticationUtils): Response {
    if ($this->getUser()) {
      return $this->redirectToRoute('homepage');
    }

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();
    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/login.html.twig', [
          'last_username' => $lastUsername,
          'error' => $error,
    ]);
  }

}
