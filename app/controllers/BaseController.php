<?php
namespace app\controllers;

/**
 * Base controller.
 * @author Artem Rasskosov
 */

use Yii;
use yii\web\Controller;
use common\services\UserAuthService;
use common\services\UserRegistrationService;

abstract class BaseController extends Controller
{
    /**
     * @return UserAuthService
     */
    public function getUserAuthService()
    {
        return Yii::$container->get('userAuthService');
    }

    /**
     * @return UserRegistrationService
     */
    public function getUserRegistrationService()
    {
        return Yii::$container->get('userRegistrationService');
    }
}
