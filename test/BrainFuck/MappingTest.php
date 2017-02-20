<?php

namespace BrainFuck;

class MappingTest extends \PHPUnit_Framework_TestCase
{
    public function provideTestProgram()
    {
        $bf = '++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.';
        $program = '222222222260222222202222222222022202111137022402422222224422240224112222222222222224042224333333433333333402404';

        return [
            [$bf, $program],
        ];
    }

    /**
     * @dataProvider provideTestProgram
     */
    public function testTranslateToBrainfuck($bf, $program)
    {
        $mapping = new Mapping(range(0, 7));
        $this->assertSame($mapping->toBrainfuck($program), $bf);
    }

    public function testTranslateToBrainfuckWithSpaces()
    {
        $mapping = new Mapping(['NXT', 'PRV', 'INC', 'DEC', 'PUT', 'GET', 'OPN', 'CLS']);
        $this->assertSame(',+.', $mapping->toBrainfuck('GET INC PUT'));
    }

    public function testTranslateToBrainfuckWithNewLines()
    {
        $mapping = new Mapping(['NXT', 'PRV', 'INC', 'DEC', 'PUT', 'GET', 'OPN', 'CLS']);
        $this->assertSame(',+.', $mapping->toBrainfuck("GET\r\nINC\r\nPUT"));
    }

    /**
     * @dataProvider provideTestProgram
     */
    public function testTranslateFromBrainfuck($bf, $program)
    {
        $mapping = new Mapping(range(0, 7));
        $this->assertSame($mapping->fromBrainfuck($bf), $program);
    }

    /**
     * @dataProvider provideTestProgram
     */
    public function testHelloWorld($bf, $program)
    {
        $this->assertSame((new Mapping())->helloWorld(), $bf);
        $this->assertSame((new Mapping(range(0, 7)))->helloWorld(), $program);
    }
}
