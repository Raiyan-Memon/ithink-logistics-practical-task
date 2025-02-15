<?php

namespace App\Logging;

use Monolog\Logger as Monolog;
use ThibaudDauce\Mattermost\Mattermost;
use ThibaudDauce\MattermostLogger\MattermostHandler;

class MMLogger
{
    public $mattermost;

    public function __construct(Mattermost $mattermost)
    {
        $this->mattermost = $mattermost;
    }

    public function __invoke($options)
    {
        $options = array_merge([
            'webhook' => env('MATTERMOST_WEBHOOK'),
            'channel' => 'ithink-logistics-errors',
            'icon_url' => null,
            'username' => 'Laravel Logs',
        ], $options);
        return new Monolog('mattermost', [new MattermostHandler($this->mattermost, $options)]);
    }
}
