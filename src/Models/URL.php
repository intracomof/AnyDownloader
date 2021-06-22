<?php
namespace AnyDownloader\Models;

use AnyDownloader\Exception\NotValidUrlException;

final class URL
{
    /**
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $substr
     * @return bool
     */
    public function includes(string $substr): bool
    {
        if (stripos($this->value, $substr) !== false) {
            return true;
        }
        return false;
    }

    /**
     * URL constructor.
     * @param string $value
     */
    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param string $url
     * @return static
     * @throws NotValidUrlException
     */
    public static function fromString(string $url): self
    {
        if (
            stripos($url, 'http://') !== 0
            || stripos($url, 'https://') !== 0
            || stripos($url, '//') !== 0
        ) {
            throw new NotValidUrlException();
        }

        return new self($url);
    }
}