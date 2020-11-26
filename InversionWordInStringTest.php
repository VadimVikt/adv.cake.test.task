<?php

use PHPUnit\Framework\TestCase;

require 'InversionWordInString.php';

class InversionWordInStringTest extends TestCase
{
    private $inversionWord;

    protected function setUp()
    {
        $this->inversionWord = new InversionWordInString();
    }

    protected function tearDown()
    {
        $this->inversionWord = NULL;
    }

    public function testInversionString() {
        $result = $this->inversionWord->inversionString('Привет! Давно не виделись.');
        $this->assertEquals('Тевирп! Онвад ен ьсиледив.', $result);
    }
}
