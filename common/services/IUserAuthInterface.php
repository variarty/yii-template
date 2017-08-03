<?php

namespace common\services;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */

use common\services\dto\UserAuthDto;

interface IUserAuthInterface
{
    /**
     * @param UserAuthDto $dto
     *
     * @return bool
     */
    public function signIn(UserAuthDto $dto) :bool;
}
