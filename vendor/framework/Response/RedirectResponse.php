<?php

namespace Framework\Response;


/**
 * Class RedirectResponse
 * @package Framework\Response
 */
class RedirectResponse extends Response
{
    /**
     * RedirectResponse constructor.
     * @param $link
     * @param int $code
     */
    public function __construct($link, $code = 301)
    {
        $this->setHeader('Location', $link);
        $this->setContent('Test');
        $this->code = $code;
    }
}