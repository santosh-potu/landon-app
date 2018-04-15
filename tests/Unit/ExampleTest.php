<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Title;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    
    public function testTitlesModelCount(){
        $title = new Title();
        //$value = 1;
        //$this->assertTrue(1 == $value ,'Value Should be 1');
        
        $this->assertTrue(count($title->all()) == 6,'It should have 6 Titles');
    }
    
    public function testLastTitleShouldBeProfession() 
    {
        $title = new Title;
        $titles_array =  $title->all();
        $this->assertEquals('Professor', array_pop($titles_array),'Titles last element should be Professor');
    }
}
