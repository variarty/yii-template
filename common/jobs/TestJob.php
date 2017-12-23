<?php
namespace common\jobs;

/**
 * Test Job.
 * @author Artem Rasskosov
 */

use Yii;
use yii\queue\Queue;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class TestJob extends BaseObject implements JobInterface
{
    /**
     * @var string $msg
     */
    public $msg;

    /**
     * @param Queue $queue
     */
    public function execute($queue)
    {
        echo $this->msg;die;
        Yii::info($this->msg);
    }
}
