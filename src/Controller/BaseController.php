<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 26.02.19
 * Time: 08:37
 */

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class BaseController extends AbstractController
{
    protected function getUser(): User
    {

        return parent::getUser();
    }

}