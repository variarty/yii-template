<?php
namespace app\controllers;

/**
 * Base controller.
 * @author Artem Rasskosov
 */

use Yii;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    /**
     * @param $nameInContainer
     * @return mixed
     */
    protected function get($nameInContainer)
    {
        return Yii::$container->get($nameInContainer);
    }
}
