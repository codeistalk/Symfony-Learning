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
class LuckyController extends AbstractController {

	/**
	 * @Route("/lucky/number")
	 * @return Response
	 * @throws \Exception
	 */
	public function number () {
		$number = random_int ( 0, 100 );

		return $this->render ( 'lucky/number.html.twig', [
			'number' => $number,
		] );
	}

}