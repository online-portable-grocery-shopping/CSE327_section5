<?php declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
final class valueinfo extends TestCase
{
    public function testCanBeCreatedFromValidReturnValue()
    {   
        require 'testing info.php' ;
        $this->assertEquals(true, INFO(2));       
 
    }

}
?>