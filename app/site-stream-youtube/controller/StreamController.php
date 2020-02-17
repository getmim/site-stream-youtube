<?php
/**
 * StreamController
 * @package site-stream-youtube
 * @version 0.0.1
 */

namespace SiteStreamYoutube\Controller;

use LibFormatter\Library\Formatter;
use StreamYoutube\Model\StreamYoutube as SYoutube;
use SiteStreamYoutube\Library\Meta;

class StreamController extends \Site\Controller
{
    public function singleAction() {
        $stream = SYoutube::getOne([]);
        if(!$stream)
            return $this->show404();

        $stream = Formatter::format('stream-youtube', $stream, ['user']);

        $params = [
            'stream' => $stream,
            'meta'   => Meta::single($stream)
        ];

        $this->res->render('stream/youtube/single', $params);
        $this->res->setCache(86400);
        $this->res->send();
    }
}