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
class CompanyController extends AbstractController {

	/**
	 * @Route({
	 *     "nl": "/over-ons",
	 *     "en": "/about-us"
	 *     }, name="about_us")
	 *
	 * @return Response
	 * @throws \Exception
	 */
	public function about () {

		return $this->render ( 'pages/about.html.twig', [
			'about' => 'this is about us page for my company',
		] );
	}

}