<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 21.02.19
 * Time: 13:56
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ArticleController
 * @package App\Controller
 */
class ArticleController {

	/**
	 * @Route("/")
	 * @return Response
	 */
	public function homepage () {
		return new Response( 'this is first page' );
	}

	/**
	 * @Route("/news/{slug}")
	 */
	public function show ( $slug ) {
		return new Response( sprintf ( 'Future page to show the article: %s', $slug ) );
	}
}