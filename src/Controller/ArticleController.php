<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 21.02.19
 * Time: 13:56
 */

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Service\MarkdownHelper;
use App\Service\SlackClient;
use Doctrine\ORM\EntityManagerInterface;
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

	private $isDebug;

	public function __construct ( bool $isDebug ) {
		$this->isDebug = $isDebug;
	}

	/**
	 * @Route("/", name="app_homepage")
	 * @return Response
	 */
	public function homepage ( ArticleRepository $repository ) {
		$articles = $repository->findAllPublishedOrderedByNewest ();

		return $this->render ( 'article/homepage.html.twig', [
			'articles' => $articles,
		] );
	}

	/**
	 * @Route("/news/{slug}", name="article_show")
	 *
	 */
	public function show ( Article $article, SlackClient $slack ) {

		if ( $article->getSlug () === 'khan' ) {
			$slack->sendMessage ( 'Khan', 'Ah, Kirk, My old friend!' );
		}

		return $this->render ( 'article/show.html.twig', [
			'article' => $article,
		] );
	}

	/**
	 * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
	 */
	public function toggleArticleHeart ( Article $article, LoggerInterface $logger, EntityManagerInterface $em ) {
		$article->incrementHeartCount ();
		$em->flush ();

		$logger->info ( 'Article is being hearted' );

		return new JsonResponse( [ 'hearts' => $article->getHeartCount () ] );
	}
}