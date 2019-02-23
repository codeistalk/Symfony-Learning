<?php
/**
 * Created by PhpStorm.
 * User: radhasoami
 * Date: 2/23/2019
 * Time: 11:01 AM
 */

namespace App\Helper;


use Psr\Log\LoggerInterface;

trait LoggerTrait
{
    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logInfo(string $message, array $context = [])
    {
        if ($this->logger) {
            $this->logger->info($message, $context);
        }

    }

}