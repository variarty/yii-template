<?php
namespace console\commands;

/**
 * Test command.
 * @author Artem Rasskosov
 */

use Yii;

use yii\{
    queue\Queue,
    helpers\Console,
    console\ExitCode
};

use common\jobs\TestJob;

class TestController extends BaseController
{
    /**
     * @return int
     */
    public function actionIndex()
    {
        $this->stdout("I'm ready!\n", Console::FG_GREEN);

        return ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionJob()
    {
        /** @var Queue $queue */
        $queue = Yii::$app->queue;

        $queue->delay(30)->push(new TestJob([
            'msg' => "I'm ready!\n"
        ]));

        return ExitCode::OK;
    }
}
