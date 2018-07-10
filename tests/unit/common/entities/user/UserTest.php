<?php

namespace tests\unit\common\entities\user;

/**
 * @coversDefaultClass User
 * @author Artem Rasskosov
 */

use DateTimeImmutable;
use common\entities\user\User;
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
     * @covers ::getSurname
     * @covers ::getDateCreated
     * @dataProvider createProvider
     *
     * @param string $email
     * @param string $password
     * @param string $authKey
     * @param string $name
     * @param string $surname
     */
    public function testCreate($email, $password, $authKey, $name = null, $surname = null)
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
        $this->assertEquals($name, $user->getName());
        $this->assertEquals($surname, $user->getSurname());
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
            ['test@test.com', 'password', 'authKey', 'first', 'last'],
            ['mail@test.com', 'pass', 'auth', null]
        ];
    }
}
