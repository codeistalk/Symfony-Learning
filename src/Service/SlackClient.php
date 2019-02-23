<?php
/**
 * Created by PhpStorm.
 * User: radhasoami
 * Date: 2/23/2019
 * Time: 10:46 AM
 */

namespace App\Service;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;

/**
 * Class SlackClient
 * @package App\Service
 */
class SlackClient
{
    use LoggerTrait;

    private $slack;

    /**
     * SlackClient constructor.
     * @param Client $slack
     */
    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }

    /**
     * @param string $from
     * @param string $message
     * @throws \Http\Client\Exception
     */
    public function sendMessage(string $from, string $message)
    {

        $this->logInfo('Beaming a message to Slack!', [
            'message' => $message
        ]);


        $slackMessage = $this->slack->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message);

        $this->slack->sendMessage($slackMessage);
    }
}