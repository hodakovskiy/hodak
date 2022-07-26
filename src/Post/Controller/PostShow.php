<?php

namespace Hodak\SergeyBlog\Post\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostShow extends AbstractController
{
    /**
     * @Route("/post/controller/post/show", name="post_controller_post_show")
     */
    public function index(): Response
    {
        return $this->render('post/controller/post_show/index.html.twig', [
            'controller_name' => 'PostShow',
        ]);
    }
}
