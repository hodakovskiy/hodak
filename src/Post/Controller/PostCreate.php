<?php

namespace Hodak\SergeyBlog\Post\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostCreate extends AbstractController
{
    /**
     * @Route("/post/controller/post/create", name="post_controller_post_create")
     */
    public function index(): Response
    {
        return $this->render('post/post_create.html.twig', [
            'controller_name' => 'PostCreate',
        ]);
    }
}
