<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 21.02.19
 * Time: 13:56
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ArticleController
 * @package App\Controller
 */
class ArticleController extends AbstractController {

	/**
	 * @Route("/", name="app_homepage")
	 * @return Response
	 */
	public function homepage () {
		return $this->render ( 'article/homepage.html.twig' );
	}

	/**
	 * @Route("/news/{slug}", name="article_show")
	 *
	 * @param $slug
	 *
	 * @return Response
	 */
	public function show ( $slug ) {
		$comments = [
			'Morbi condimentum justo ex, at.',
			'eque porro quisquam est qui dolorem ipsum quia dolor sit amet',
			'last one',
		];

		return $this->render ( 'article/show.html.twig', [
			'title'    => ucwords ( str_replace ( '-', ' ', $slug ) ),
			'comments' => $comments,
		] );
	}
}