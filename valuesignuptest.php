<?php declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
final class valueinfo extends TestCase
{
    public function testCanBeCreatedFromValidReturnValue3()
    {   
        require 'testing signup.php' ;
        $this->assertEquals(true, SIGNUP(3));       
 
    }

}
?>