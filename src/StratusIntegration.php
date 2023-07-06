<?php

namespace clickrain\stratus\blitz;

use clickrain\stratus\services\StratusService;
use putyourlightson\blitz\Blitz;
use putyourlightson\blitz\drivers\integrations\IntegrationInterface;
use yii\base\Event;

class StratusIntegration implements IntegrationInterface
{
    public static function getRequiredPlugins(): array
    {
        return [
            ['handle' => 'stratus', 'version' => '1.0.0']
        ];
    }

    public static function registerEvents()
    {
        Event::on(StratusService::class, StratusService::EVENT_BEFORE_SYNC,
            function() {
                Blitz::$plugin->refreshCache->batchMode = true;
            }
        );
        Event::on(StratusService::class, StratusService::EVENT_AFTER_SYNC,
            function() {
                Blitz::$plugin->refreshCache->refresh();
            }
        );
    }
}