<?php declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
final class valueinfo extends TestCase
{
    public function testCanBeCreatedFromValidReturnValue2()
    {   
        require 'testing update.php' ;
        $this->assertEquals(true, UPDATE(3));       
 
    }

}
?>