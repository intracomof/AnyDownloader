<?php
namespace AnyDownloader;

use AnyDownloader\Models\DownloaderResult;
use AnyDownloader\Models\URL;

interface Downloader
{
    public function fetchResource(URL $url): DownloaderResult;
}