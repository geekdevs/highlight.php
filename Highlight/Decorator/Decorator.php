<?php
namespace Highlight\Decorator;

/**
 * Interface Decorator
 * @package Highlight\Decorator
 */
interface Decorator
{
    /**
     * @param string $nodeType
     * @param string $contents
     * @param bool   $leaveOpen
     * @param bool   $isNested
     *
     * @return string
     */
    public function decorate(
        string $nodeType,
        string $contents,
        bool $leaveOpen = false,
        bool $isNested = false
    ): string;

    /**
     * @return string
     */
    public function close(): string;

    /**
     * @param string $value
     *
     * @return string
     */
    public function escape(string $value): string;
}
