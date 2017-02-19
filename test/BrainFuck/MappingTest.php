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
    public function testTranslateToBf($bf, $program)
    {
        $mapping = new Mapping(range(0, 7));
        $this->assertSame($mapping->toBf($program), $bf);
    }

    /**
     * @dataProvider provideTestProgram
     */
    public function testTranslateFromBf($bf, $program)
    {
        $mapping = new Mapping(range(0, 7));
        $this->assertSame($mapping->fromBf($bf), $program);
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
