<?php

namespace Framework\Response;


/**
 * Class ErrorResponse
 * @package Framework\Response
 */
class ErrorResponse extends Response
{
    /**
     * ErrorResponse constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct($message = '', $code = 500)
    {
        $this->setContent(empty($message) ? parent::STATUS_MSGS[$code] : $message);
        $this->code = $code;
    }
}