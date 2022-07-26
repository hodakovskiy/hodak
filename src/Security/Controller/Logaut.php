<?php

namespace Hodak\SergeyBlog\Security\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Logaut extends AbstractController
{
    /**
     * @Route("/logout", name="user_logout")
     */
    public function index()
    {
         throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
