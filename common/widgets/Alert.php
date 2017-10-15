<?php
namespace common\widgets;

/**
 * Render bootstrap alert component by session flash
 * @author Artem Rasskosov
 */

use Yii;
use yii\bootstrap\Widget;
use yii\bootstrap\Alert as BootstrapAlert;

class Alert extends Widget
{
    /**
     * @var array $typeMap
     */
    private $typeMap = [
        'info'      => 'alert-info',
        'error'     => 'alert-danger',
        'warning'   => 'alert-warning',
        'success'   => 'alert-success',
    ];

    /**
     * @var array $flashes
     */
    private $flashes;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $session        = Yii::$app->session;
        $this->flashes  = $session->getAllFlashes();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach ($this->flashes as $type => $alerts) {
            if (isset($this->typeMap[$type])) {
                $this->renderAlerts($type, $alerts);
            }
        }
    }

    /**
     * @param string $type
     * @param array $alerts
     */
    private function renderAlerts(string $type, array $alerts)
    {
        foreach ($alerts as $message) {
            echo BootstrapAlert::widget([
                'options'   => ['class' => "alert-$type"],
                'body'      => $message,
            ]);
        }
    }
}
