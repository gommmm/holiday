<?php
declare(strict_types=1);

namespace Test;

use Main\Holiday;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    public function testUpdateDate()
    {   
        $holiday = new Holiday();
        $holiday->setDate(new \DateTime('2018-02-22'));

        $this->assertTrue($holiday->checkUpdateDate());
    }

    public function testNotUpdateDate()
    {
        $holiday = new Holiday();
        $holiday->setDate(new \DateTime('2018-09-13'));

        $this->assertFalse($holiday->checkUpdateDate());
    }

    public function testCheckHoldayCount()
    {
        $holiday = new Holiday();
        $holiday->setDate(new \DateTime('2018-04-13'));
        $this->assertEquals(10, $holiday->getCount());
    }
}