<?php
namespace tests\app\forms;

/**
 * @coversDefaultClass SignUpForm
 * @author Artem Rasskosov
 */

use app\forms\SignUpForm;
use PHPUnit\Framework\TestCase;
use common\services\dto\UserRegistrationDto;

class SignUpFormTest extends TestCase
{
    /**
     * @covers ::getDto
     */
    public function testGetDto()
    {
        $form = new SignUpForm([
            'email'             => 'test@email.com',
            'password'          => 'test',
            'passwordRepeat'    => false,
        ]);

        $this->assertInstanceOf(UserRegistrationDto::class, $form->getDto());
    }
}
