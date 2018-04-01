<?php
namespace console\commands;

/**
 * Rbac command.
 * @author Artem Rasskosov
 */

use Yii;

use yii\{
    helpers\Console,
    console\ExitCode
};

class RbacController extends BaseController
{
    /**
     * @return int
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $user);

        return ExitCode::OK;
    }
}
