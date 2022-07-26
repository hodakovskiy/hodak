<?php

namespace Hodak\SergeyBlog\Post\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostEdit extends AbstractController
{
    /**
     * @Route("/post/controller/post/edit", name="post_controller_post_edit")
     */
    public function index(): Response
    {
        return $this->render('post/controller/post_edit/index.html.twig', [
            'controller_name' => 'PostEdit',
        ]);
    }
}
