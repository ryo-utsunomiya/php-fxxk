<?php

namespace BrainFuck;

class Mapping
{
    const DEFAULT_MAPPING =  ['>', '<', '+', '-', '.', ',', '[', ']'];
    const DEFAULT_HELLO_WORLD = '++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.';
    
    protected $mapping = self::DEFAULT_MAPPING;

    public function __construct(array $mapping = [])
    {
        foreach ($mapping as $i => $arg) {
            if (isset($this->mapping[$i])) {
                $this->mapping[$i] = $arg;
            }
        }
    }
    
    /**
     * @return string
     */
    public function helloWorld()
    {
        return $this->fromBf(self::DEFAULT_HELLO_WORLD);
    }

    /**
     * @param string $program
     * @return string
     */
    public function toBf($program)
    {
        return str_replace(
            $this->mapping,
            self::DEFAULT_MAPPING,
            $program
        );
    }

    /**
     * @param string $program
     * @return string
     */
    public function fromBf($program)
    {
        return str_replace(
            self::DEFAULT_MAPPING,
            $this->mapping,
            $program
        );
    }
}