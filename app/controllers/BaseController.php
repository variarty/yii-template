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
     * @param string $nameInContainer
     * @param array $params
     * @param array $config
     * @return mixed
     */
    protected function get($nameInContainer, array $params = [], array $config = [])
    {
        return Yii::$container->get($nameInContainer, $params, $config);
    }
}
