<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 21.02.19
 * Time: 11:00
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class LuckyController
 * @package App\Controller
 */
class LuckyController {

	/**
	 *
	 * @return Response
	 * @throws \Exception
	 */
	public function number () {
		$number = random_int ( 0, 100 );

		return new Response(
			'<html lang="en"><body>Lucky number: ' . $number . '</body></html>'
		);
	}

}