<?php

namespace PHP\Math\BigNumberTest;

use PHP\Math\BigNumber\BigNumber;
use PHPUnit_Framework_TestCase;

class BigNumberMultiplyTest extends PHPUnit_Framework_TestCase
{
    public function testWithBigNumber()
    {
        // Arrange
        $bigNumber = new BigNumber('1234567890.1234567890');
        $value = new BigNumber('1234567890.1234567890');

        // Act
        $bigNumber->multiply($value);

        // Assert
        $this->assertInternalType('string', $bigNumber->getValue());
        $this->assertEquals('1524157875323883675.0190519987', $bigNumber->getValue());
    }

    public function testWithFloat()
    {
        // Arrange
        $bigNumber = new BigNumber('1234567890.1234567890');
        $value = 12.34;

        // Act
        $bigNumber->multiply($value);

        // Assert
        $this->assertInternalType('string', $bigNumber->getValue());
        $this->assertEquals('15234567764.1234567762', $bigNumber->getValue());
    }

    public function testWithInteger()
    {
        // Arrange
        $bigNumber = new BigNumber('1234567890.1234567890');
        $value = 12;

        // Act
        $bigNumber->multiply($value);

        // Assert
        $this->assertInternalType('string', $bigNumber->getValue());
        $this->assertEquals('14814814681.4814814680', $bigNumber->getValue());
    }

    public function testWithStringFloat()
    {
        // Arrange
        $bigNumber = new BigNumber('1234567890.1234567890');
        $value = '1234567890.1234567890';

        // Act
        $bigNumber->multiply($value);

        // Assert
        $this->assertInternalType('string', $bigNumber->getValue());
        $this->assertEquals('1524157875323883675.0190519987', $bigNumber->getValue());
    }

    public function testWithStringInteger()
    {
        // Arrange
        $bigNumber = new BigNumber('1234567890.1234567890');
        $value = '1234567890';

        // Act
        $bigNumber->multiply($value);

        // Assert
        $this->assertInternalType('string', $bigNumber->getValue());
        $this->assertEquals('1524157875171467887.5019052100', $bigNumber->getValue());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testWithNonNumber()
    {
        // Arrange
        $bigNumber = new BigNumber('0');
        $value = 'abc';

        // Act
        $bigNumber->multiply($value);

        // Assert
        // ...
    }

    public function testWithMutableFalse()
    {
        // Arrange
        $bigNumber = new BigNumber('5', 10, false);

        // Act
        $newBigNumber = $bigNumber->multiply(10);

        // Assert
        $this->assertInstanceOf('PHP\Math\BigNumber\BigNumber', $bigNumber);
        $this->assertInstanceOf('PHP\Math\BigNumber\BigNumber', $newBigNumber);
        $this->assertEquals('5', $bigNumber->getValue());
        $this->assertEquals('50', $newBigNumber->getValue());
    }

    public function testWithMutableTrue()
    {
        // Arrange
        $bigNumber = new BigNumber('5', 10, true);

        // Act
        $newBigNumber = $bigNumber->multiply(10);

        // Assert
        $this->assertInstanceOf('PHP\Math\BigNumber\BigNumber', $bigNumber);
        $this->assertInstanceOf('PHP\Math\BigNumber\BigNumber', $newBigNumber);
        $this->assertEquals('50', $bigNumber->getValue());
        $this->assertEquals('50', $newBigNumber->getValue());
    }
}
