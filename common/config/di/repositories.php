<?php

/**
 * Declare some repositories
 */
Yii::$container->set(
    common\repositories\UserRepositoryInterface::class,
    common\repositories\UserRepository::class
);
