<?php

namespace BrainFuck;

class Mapping
{
    const DEFAULT_MAPPING = ['>', '<', '+', '-', '.', ',', '[', ']'];
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
        return $this->fromBrainfuck(self::DEFAULT_HELLO_WORLD);
    }

    /**
     * @param string $program
     * @return string
     */
    public function toBrainfuck($program)
    {
        $bf = str_replace($this->mapping, self::DEFAULT_MAPPING, $program);
        $bf = str_replace([' ', "\n", "\r"], '', $bf);
        $bf = trim($bf);

        return $bf;
    }

    /**
     * @param string $program
     * @return string
     */
    public function fromBrainfuck($program)
    {
        return str_replace(self::DEFAULT_MAPPING, $this->mapping, $program);
    }
}