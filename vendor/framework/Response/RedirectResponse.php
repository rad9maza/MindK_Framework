<?php

namespace Framework\Response;


class RedirectResponse extends Response
{
    public function __construct($link, $code = 301)
    {
        $this->setHeader('Location', $link);
        $this->setContent('Test');
        $this->code = $code;
    }
}