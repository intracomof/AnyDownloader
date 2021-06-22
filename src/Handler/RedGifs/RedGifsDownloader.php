<?php
namespace AnyDownloader\Handler\RedGifs;

use AnyDownloader\Handler\BaseHandler;
use AnyDownloader\Models\DownloaderResult;
use AnyDownloader\Models\URL;

class RedGifsDownloader extends BaseHandler
{
    protected $urlCanContain = [
        '//redgifs.com/watch/'
    ];

    public function fetchResource(URL $url): DownloaderResult
    {
        // TODO: Implement fetchResource() method.
        return new DownloaderResult();
    }

}