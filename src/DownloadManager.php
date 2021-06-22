<?php
namespace AnyDownloader;

use AnyDownloader\Exception\HandlerNotFoundException;
use AnyDownloader\Handler\BaseHandler;
use AnyDownloader\Models\DownloaderResult;
use AnyDownloader\Models\URL;

final class DownloadManager implements Downloader
{
    /**
     * @var BaseHandler[]
     */
    private $handlerRegistry;


    /**
     * @param URL $url
     * @return DownloaderResult
     * @throws HandlerNotFoundException
     */
    public function fetchResource(URL $url): DownloaderResult
    {
        foreach($this->handlerRegistry as $handler) {
            if ($handler->isValidUrl($url)) {
                return $handler->fetchResource($url);
            }
        }
        throw new HandlerNotFoundException();
    }

    /**
     * @param BaseHandler $handler
     */
    public function addDownloader(BaseHandler $handler)
    {
        $this->handlerRegistry[get_class($handler)] = $handler;
    }

}