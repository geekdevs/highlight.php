<?php
namespace Highlight\Decorator;

class StatefulCliDecorator extends CliDecorator
{
    /**
     * @var string[]
     */
    private $colorsStack = [];

    /**
     * @param string $nodeType
     *
     * @return string
     */
    protected function open(string $nodeType): string
    {
        $output = parent::open($nodeType);
        $this->colorsStack[] = $output;

        return $output;
    }

    /**
     * @return string
     */
    public function close(): string
    {
        $output = parent::close();
        array_pop($this->colorsStack); //remove current color from stack

        //get and use previous color
        $color = end($this->colorsStack);
        if ($color) {
            $output .= $color;
        }

        return $output;
    }
}
