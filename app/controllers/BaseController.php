<?php
namespace app\controllers;

/**
 * @author Artem Rasskosov
 * @since 02.07.2017
 */

use Yii;
use yii\web\Controller;
use common\services\IUserAuthInterface;

abstract class BaseController extends Controller
{
    /**
     * @return IUserAuthInterface
     */
    public function getUserAuthService()
    {
        return Yii::$container->get(IUserAuthInterface::class);
    }
}
