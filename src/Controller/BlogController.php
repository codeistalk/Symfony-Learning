<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 21.02.19
 * Time: 11:00
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LuckyController
 * @package App\Controller
 */
class BlogController extends AbstractController {

	/**
	 * Matches /blog exactly
	 *
	 * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
	 *
	 * @return Response
	 */
	public function list ( $page  = 1) {
		return $this->render ( 'blog/index.html.twig', [
			'posts' => [
				'First Post',
				'Second Post',
				'Third Post',
				'Fourth Post',
				'Fifth Post',
			],
		] );
	}

	/**
	 * Matches /blog/*
	 * @Route("/blog/{slug}", name="blog_show")
	 *
	 * @param $slug
	 *
	 * @return Response
	 */
	public function show ( $slug ) {
		return $this->render ( 'blog/show.html.twig', [
			'post' => 'This is first post',
		] );
	}

}