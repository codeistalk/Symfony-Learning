<?php
/**
 * Created by PhpStorm.
 * User: radhasoami
 * Date: 2/23/2019
 * Time: 12:10 PM
 */

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleAdminController
 * @package App\Controller
 * @IsGranted("ROLE_ADMIN")
 */
class ArticleAdminController extends AbstractController {

	/**
	 * @Route("/admin/article/new", name="admin_article_new")
	 */
	public function new ( EntityManagerInterface $em ) {
		die( 'todo' );

		return new Response( sprintf (
			                     'Hiya! new article is: #%d slug: %s',
			                     $article->getId (),
			                     $article->getSlug ()
		                     ) );
	}

}