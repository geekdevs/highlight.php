<?php
namespace Highlight\Decorator;

/**
 * Class HtmlDecorator
 * @package Highlight\Decorator
 */
class HtmlDecorator implements Decorator
{
    /**
     * @var string
     */
    private $classPrefix;

    /**
     * @var bool
     */
    private $escape;

    /**
     * HtmlDecorator constructor.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->classPrefix = $options['classPrefix'] ?? '';
        $this->escape = $options['escape'] ?? true;
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
        $classPrefix = $isNested ? '' : $this->classPrefix; //no prefix for sub-language
        $htmlClass = $classPrefix.$nodeType;

        $output = '<span class="'.$htmlClass.'">';
        $output .= $contents;

        if (!$leaveOpen) {
            $output .= $this->close();
        }

        return $output;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function escape(string $value): string
    {
        if ($this->escape) {
            return htmlspecialchars($value, ENT_NOQUOTES);
        }

        return $value;
    }

    /**
     * @return string
     */
    public function close(): string
    {
        return '</span>';
    }
}
