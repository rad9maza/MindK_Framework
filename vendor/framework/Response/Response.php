<?php

namespace Framework\Response;


/**
 * Class Response
 * @package Framework\Response
 */
class Response
{
    /**
     * @var array store Response headers
     */
    protected $headers = [];

    /**
     * @var int store status code of Response
     */
    public $code;

    /**
     * @var string store content_type header of response
     * @default 'text/html'
     */
    public $content_type = 'text/html';

    /**
     * @var string store Response content
     */
    public $content = '';

    /**
     * @return array with Response headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Method set(add) Response headers
     * @param $header
     * @param $value
     */
    public function setHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    /**
     * Method set Response content
     * @param $data
     */
    public function setContent($data)
    {
        $this->content = $data;
    }

    /**
     * Response constructor.
     * @param $data
     * @param int $code default 200
     */
    public function __construct($data, $code = 200)
    {
        $this->code = $code;
        $this->setContent($data);
        $this->setHeader('Content-Type', $this->content_type);
    }

    /**
     * Method send full Response
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    /**
     * Method send Response headers
     */
    private function sendHeaders()
    {
        header("HTTP/1.1 " . $this->code . " " . self::STATUS_MSGS[$this->code]);
        if (!empty($this->headers)) {
            foreach ($this->headers as $key => $value) {
                header(sprintf('%s: %s', $key, $value));
            }
        }
    }

    /**
     * Method send Response content
     */
    private function sendContent()
    {
        echo $this->content;
    }

    /**
     * @var array contains STATUS_MSGS
     */
    const STATUS_MSGS = [
        //Informational
        100 => 'Continue', //продолжай
        101 => 'Switching Protocols', //переключение протоколов
        102 => 'Processing', //идёт обработка
        //Success
        200 => 'OK', //хорошо
        201 => 'Created', //создано
        202 => 'Accepted', //принято
        203 => 'Non-Authoritative Information', //информация не авторитетна
        204 => 'No Content', //нет содержимого
        205 => 'Reset Content', //сбросить содержимое
        206 => 'Partial Content', //частичное содержимое
        207 => 'Multi-Status', //многостатусный
        226 => 'IM Used', //использовано IM
        //Redirection
        300 => 'Multiple Choices', //множество выборов
        301 => 'Moved Permanently', //перемещено навсегда
        302 => 'Moved Temporarily', //перемещено временно
        303 => 'See Other', // (смотреть другое
        304 => 'Not Modified', // (не изменялось
        305 => 'Use Proxy', //использовать прокси
        307 => 'Temporary Redirect', //временное перенаправление
        //Client Error
        400 => 'Bad Request', //плохой, неверный запрос
        401 => 'Unauthorized', //не авторизован
        402 => 'Payment Required', //необходима оплата
        403 => 'Forbidden', //запрещено
        404 => 'Not Found', //не найдено
        405 => 'Method Not Allowed', //метод не поддерживается
        406 => 'Not Acceptable', //неприемлемо
        407 => 'Proxy Authentication Required', //необходима аутентификация прокси
        408 => 'Request Timeout', //истекло время ожидания
        409 => 'Conflict', //конфликт
        410 => 'Gone', //удалён
        411 => 'Length Required', //необходима длина
        412 => 'Precondition Failed', //условие ложно»
        413 => 'Request Entity Too Large', //размер запроса слишком велик
        414 => 'Request-URI Too Large', //запрашиваемый URI слишком длинный
        415 => 'Unsupported Media Type', //неподдерживаемый тип данных
        416 => 'Requested Range Not Satisfiable', //запрашиваемый диапазон не достижим
        417 => 'Expectation Failed', //ожидаемое неприемлемо
        422 => 'Unprocessable Entity', //необрабатываемый экземпляр
        423 => 'Locked', //заблокировано
        424 => 'Failed Dependency', //невыполненная зависимость
        425 => 'Unordered Collection', //неупорядоченный набор
        426 => 'Upgrade Required', //необходимо обновление
        428 => 'Precondition Required', //необходимо предусловие
        429 => 'Too Many Requests', //слишком много запросов
        431 => 'Request Header Fields Too Large', //поля заголовка запроса слишком большие
        434 => 'Requested host unavailable.', //Запрашиваемый адрес недоступен»)[источник не указан 1088 дней]
        449 => 'Retry With', //повторить с
        451 => 'Unavailable For Legal Reasons', //недоступно по юридическим причинам
        //Server Error
        500 => 'Internal Server Error', //внутренняя ошибка сервера
        501 => 'Not Implemented', //не реализовано
        502 => 'Bad Gateway', //плохой, ошибочный шлюз
        503 => 'Service Unavailable', //сервис недоступен
        504 => 'Gateway Timeout', //шлюз не отвечает
        505 => 'HTTP Version Not Supported', //версия HTTP не поддерживается
        506 => 'Variant Also Negotiates', //вариант тоже проводит согласование
        507 => 'Insufficient Storage', //переполнение хранилища
        508 => 'Loop Detected', //обнаружено бесконечное перенаправление
        509 => 'Bandwidth Limit Exceeded', //исчерпана пропускная ширина канала
        510 => 'Not Extended', //не расширено
        511 => 'Network Authentication Required', //требуется сетевая аутентификация
    ];
}