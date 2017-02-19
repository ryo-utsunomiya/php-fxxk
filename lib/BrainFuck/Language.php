<?php

namespace BrainFuck;

class Language
{
    protected $parser;
    protected $mapping;

    public function __construct(Parser $parser = null)
    {
        if (!$parser) {
            $parser = new Parser;
        }
        $this->parser = $parser;
    }

    /**
     * @param Mapping $mapping
     * @return Language
     */
    public static function withMapping(Mapping $mapping)
    {
        $self = new self();
        $self->mapping = $mapping;
        return $self;
    }

    public function run($program, array $input = array())
    {
        $memory = new Memory;
        $io = new IO($input);

        $ops = $this->parser->parse($this->translate($program));

        $ops->executeProgram($memory, $io);

        return $io->getOutput();
    }

    /**
     * @param string $program
     * @return string
     */
    private function translate($program)
    {
        if ($this->mapping instanceof Mapping) {
            return $this->mapping->toBrainfuck($program);
        } else {
            return $program;
        }
    }
}
