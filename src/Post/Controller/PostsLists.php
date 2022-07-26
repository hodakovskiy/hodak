<?php

namespace Hodak\SergeyBlog\Post\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsLists extends AbstractController
{
    /**
     * @Route("/post/lists", name="post_controller_posts_lists")
     */
    public function index(): Response
    {
        return $this->render('post/posts_lists.html.twig', [
            'controller_name' => 'PostsLists',
        ]);
    }
}
