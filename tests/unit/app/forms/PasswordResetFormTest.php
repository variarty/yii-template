<?php
namespace tests\app\forms;

/**
 * @coversDefaultClass PasswordResetForm
 * @author Artem Rasskosov
 */

use PHPUnit\Framework\TestCase;
use app\forms\PasswordResetForm;
use common\services\dto\UserPasswordResetDto;

class PasswordResetFormTest extends TestCase
{
    /**
     * @covers ::getDto
     */
    public function testGetDto()
    {
        $form = new PasswordResetForm([
            'password'  => 'test',
            'token'     => 'test',
        ]);

        $this->assertInstanceOf(UserPasswordResetDto::class, $form->getDto());
    }
}
