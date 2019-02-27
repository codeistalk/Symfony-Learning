<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 27.02.19
 * Time: 09:43
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserSelectTextType extends AbstractType {

	public function getParent () {

		return TextType::class;
	}

}