<?php declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
final class valueinfo extends TestCase
{
    public function testCanBeCreatedFromValidReturnValue4()
    {   
        require 'testing immediate done.php' ;
        $this->assertEquals(true, IMMEDONE(1,2));       
 
    }

}
?>