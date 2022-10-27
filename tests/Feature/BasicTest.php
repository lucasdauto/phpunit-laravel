<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Box;

class BasicTest extends TestCase
{
    public function testBoxContents()
    {
        $box = new Box(['toy']);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }

    public function testTakeOneFromTheBox()
    {
        $box = new Box(['touch', 'toy', 'ball', 'HQ']);

        $this->assertEquals('touch', $box->takeOne());
    }

    public function testStartsWithALetter()
    {
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);

        $result = $box->startsWith('b');

        $this->assertCount(1, $result);
        //$this->assertContains('toy', $result);
        //$this->assertContains('torch', $result);
        //$this->assertContains('tissue', $result);

        // Array vazio se passado mesmo
        $this->assertEmpty($box->startsWith('s'));
    }
}
