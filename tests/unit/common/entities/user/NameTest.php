<?php

namespace tests\unit\common\entities\user;

    /**
 * @coversDefaultClass Name
 * @author Artem Rasskosov
 */

use common\entities\user\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    /**
     * @covers ::getFirst
     * @covers ::getLast
     * @covers ::getFullName
     * @dataProvider createProvider
     *
     * @param string $first
     * @param string $last
     */
    public function testCreate($first, $last)
    {
        $name = new Name($first, $last);

        $this->assertEquals($first, $name->getFirst());
        $this->assertEquals($last, $name->getLast());
        $this->assertEquals(trim("$first $last"), $name->getFullName());
    }

    /**
     * @return array
     */
    public function createProvider()
    {
        return [
            ['test', 'test'],
            ['test', null],
            [null, 'test'],
        ];
    }
}
