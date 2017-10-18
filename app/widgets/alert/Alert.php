<?php
namespace app\widgets\alert;

/**
 * Render bootstrap alert component by session flash
 * @author Artem Rasskosov
 */

use Yii;
use stdClass;
use yii\bootstrap\Widget;
use yii\bootstrap\Alert as BootstrapAlert;

class Alert extends Widget
{
    /**
     * @var array $typeMap
     */
    private $typeMap = [
        AlertType::INFO      => 'alert-info',
        AlertType::ERROR     => 'alert-danger',
        AlertType::WARNING   => 'alert-warning',
        AlertType::SUCCESS   => 'alert-success',
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
        foreach ($this->flashes as $key => $alerts) {
            try {
                $message = AlertMessages::get($key);
                $this->renderMessage($message);
            } catch (AlertMessageNotFoundException $e) {
                continue;
            }
        }
    }

    /**
     * @param stdClass $message
     */
    private function renderMessage(stdClass $message)
    {
        echo BootstrapAlert::widget([
            'options'   => ['class' => $this->typeMap[$message->type]],
            'body'      => $message->text,
        ]);
    }
}
