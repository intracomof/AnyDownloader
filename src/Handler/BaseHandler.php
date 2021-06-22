<?php
namespace AnyDownloader\Handler;

use AnyDownloader\Models\DownloaderResult;
use AnyDownloader\Models\URL;
use GuzzleHttp\Client;

abstract class BaseHandler implements Handler
{
    protected $urlCanContain = [];

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * BaseHandler constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param URL $url
     * @return bool
     */
    public function isValidUrl(URL $url): bool
    {
        if (empty($this->urlCanContain)) {
            return true;
        }
        foreach ($this->urlCanContain as $subUrl) {
            if ($url->includes($subUrl)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param URL $url
     * @return DownloaderResult
     */
    abstract function fetchResource(URL $url): DownloaderResult;
}