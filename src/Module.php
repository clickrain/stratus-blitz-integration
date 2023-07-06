<?php

namespace clickrain\stratus\blitz;

use Craft;
use craft\base\Event;
use craft\events\RegisterComponentTypesEvent;
use putyourlightson\blitz\helpers\IntegrationHelper;
use yii\base\Module as BaseModule;

/**
 * stratus-blitz module
 *
 * @method static Module getInstance()
 */
class Module extends BaseModule
{
    public function init(): void
    {
        Craft::setAlias('@modules/clickrain/stratus/blitz', __DIR__);

        parent::init();

        Event::on(IntegrationHelper::class,
            IntegrationHelper::EVENT_REGISTER_INTEGRATIONS,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = StratusIntegration::class;
            }
        );
    }
}
