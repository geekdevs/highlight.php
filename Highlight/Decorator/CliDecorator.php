<?php
namespace Highlight\Decorator;

use Highlight\Colors\Cli\Colors;

/**
 * Class CliDecorator
 * @package Highlight\Decorator
 */
class CliDecorator implements Decorator
{
    /**
     * @var array
     */
    private $colorMap;

    /**
     * CliDecorator constructor.
     *
     * @param array $colorMap
     */
    public function __construct(array $colorMap = [])
    {
        $this->colorMap = $colorMap;

        //Some required defaults
//        if (empty($this->colorMap['document'])) {
//            $this->colorMap['document'] = Colors::DARK_GRAY;
//        }
//
        if (empty($this->colorMap['default'])) {
            $this->colorMap['default'] = Colors::WHITE;
        }
    }

    /**
     * @param string $nodeType
     * @param string $contents
     * @param bool   $leaveOpen
     * @param bool   $isNested
     *
     * @return string
     */
    public function decorate(string $nodeType, string $contents, bool $leaveOpen = false, bool $isNested = false): string
    {
        $output = $this->open($nodeType);

//        $output .= '`'.$nodeType.'`: ';
        $output .= $contents;

        if (!$leaveOpen) {
            $output .= $this->close($nodeType);
        }

        return $output;
    }

    /**
     * @param string $nodeType
     *
     * @return string
     */
    protected function open(string $nodeType): string
    {
        return $this->colorMap[$nodeType] ?? $this->colorMap['default'];
    }

    /**
     * @return string
     */
    public function close(): string
    {
        return Colors::RESET;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function escape(string $value): string
    {
        //not escaping
        return $value;
    }
}
