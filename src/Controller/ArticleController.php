<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 21.02.19
 * Time: 13:56
 */

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
			'slug'     => $slug,
			'comments' => $comments,
		] );
	}

	/**
	 * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
	 */
	public function toggleArticleHeart ( $slug, LoggerInterface $logger ) {
		// TODO - actually heart/unheart the article!

		$logger->info ( 'Article is being hearted' );

		return new JsonResponse( [ 'hearts' => rand ( 5, 100 ) ] );
	}
}