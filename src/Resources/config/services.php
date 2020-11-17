<?php


namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Bytes\TwitchResponseBundle\Request\EventSubSignature;
use Bytes\TwitchResponseBundle\Request\SignatureInterface;
use Bytes\TwitchResponseBundle\Request\WebhookSignature;

/**
 * @param ContainerConfigurator $container
 */
return static function (ContainerConfigurator $container) {

    $services = $container->services();

    $services->set('bytes_twitch_response.signature.eventsub', EventSubSignature::class)
        ->public()
        ->args([''])
        ->alias(SignatureInterface::class . ' $eventSubSignature', 'bytes_twitch_response.signature.eventsub');

    $services->set('bytes_twitch_response.signature.webhook', WebhookSignature::class)
        ->public()
        ->args([''])
        ->alias(SignatureInterface::class . ' $webhookSignature', 'bytes_twitch_response.signature.webhook');

};