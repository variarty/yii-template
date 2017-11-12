<?php

namespace tests\unit\common\entities\user;

/**
 * @coversDefaultClass User
 * @author Artem Rasskosov
 */

use DateTimeImmutable;
use common\entities\user\User;
use common\entities\user\Name;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @covers ::create
     * @covers ::getId
     * @covers ::getEmail
     * @covers ::getPassword
     * @covers ::getAuthKey
     * @covers ::getName
     * @covers ::getDateCreated
     * @dataProvider createProvider
     *
     * @param string $email
     * @param string $password
     * @param string $authKey
     * @param Name|null $name
     */
    public function testCreate($email, $password, $authKey, Name $name = null)
    {
        $user = User::create(
            $email,
            $password,
            $authKey,
            $name
        );

        $this->assertNull($user->getId());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($authKey, $user->getAuthKey());
        $this->assertEquals($password, $user->getPassword());
        $this->assertInstanceOf(Name::class, $user->getName());
        $this->assertInstanceOf(DateTimeImmutable::class, $user->getDateCreate());
    }

    /**
     * @covers ::resetPassword
     */
    public function testResetPassword()
    {
        $user = User::create(
            '',
            '',
            ''
        );

        $user->resetPassword('password');
        $this->assertEquals('password', $user->getPassword());
    }

    /**
     * @return array
     */
    public function createProvider()
    {
        return [
            ['test@test.com', 'password', 'authKey', new Name('first', 'last')],
            ['mail@test.com', 'pass', 'auth', null]
        ];
    }
}
