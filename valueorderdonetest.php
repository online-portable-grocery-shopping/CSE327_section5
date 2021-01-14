<?php declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
final class valueinfo extends TestCase
{
    public function testCanBeCreatedFromValidReturnValue3()
    {   
        require 'testing orderdone.php' ;
        $this->assertEquals(true, ORDERDONE(2));       
 
    }

}
?>