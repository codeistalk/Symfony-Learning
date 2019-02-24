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
class ArticleController extends AbstractController
{

    private $isDebug;

    public function __construct(bool $isDebug)
    {
        $this->isDebug = $isDebug;
    }

    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage(ArticleRepository $repository)
    {
        $articles = $repository->findAllPublishedOrderedByNewest();

        return $this->render('article/homepage.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     *
     * @param $slug
     *
     * @param SlackClient $slack
     * @return Response
     */
    public function show($slug, SlackClient $slack, EntityManagerInterface $em)
    {

        if ($slug === 'khan') {
            $slack->sendMessage('Khan', 'Ah, Kirk, My old friend!');
        }

        $repository = $em->getRepository(Article::class);
        /**
         * @var Article $artcle
         */
        $article = $repository->findOneBy(['slug' => $slug]);

        if (!$article) {
            throw $this->createNotFoundException(sprintf('No article for slug "%s"', $slug));
        }

        $comments = [
            'Morbi condimentum justo ex, at.',
            'eque porro quisquam est qui dolorem ipsum quia dolor sit amet',
            'last one',
        ];

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart/unheart the article!

        $logger->info('Article is being hearted');

        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}