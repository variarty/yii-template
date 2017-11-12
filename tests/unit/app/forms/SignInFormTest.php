<?php
namespace tests\unit\app\forms;

/**
 * @coversDefaultClass SignInForm
 * @author Artem Rasskosov
 */

use app\forms\SignInForm;
use PHPUnit\Framework\TestCase;
use common\services\dto\UserAuthDto;

class SignInFormTest extends TestCase
{
    /**
     * @covers ::getDto
     */
    public function testGetDto()
    {
        $form = new SignInForm([
            'email'         => 'test@email.com',
            'password'      => 'test',
            'rememberMe'    => false,
        ]);

        $this->assertInstanceOf(UserAuthDto::class, $form->getDto());
    }
}
