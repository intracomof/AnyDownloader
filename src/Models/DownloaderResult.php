<?php
namespace AnyDownloader\Models;

class DownloaderResult
{
    /**
     * @var URL
     */
    private $source;

    /**
     * @return URL
     */
    public function getSource(): URL
    {
        return $this->source;
    }
}