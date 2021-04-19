<?php


namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Request\EventSubSignature;
use Bytes\TwitchResponseBundle\Request\SignatureInterface;
use Bytes\TwitchResponseBundle\Request\WebhookSignature;
use Bytes\TwitchResponseBundle\Serializer\ConditionNormalizer;
use Bytes\TwitchResponseBundle\Serializer\SubscriptionNormalizer;

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

    $services->set('bytes_twitch_response.normalizer.twitchdatetime', TwitchDateTimeNormalizer::class)
        ->args([
            service('serializer.mapping.class_metadata_factory'), // ClassMetadataFactoryInterface|null $classMetadataFactory
            service('serializer.name_converter.metadata_aware'), // NameConverterInterface|null $nameConverter
            service('property_info')->ignoreOnInvalid(), // PropertyTypeExtractorInterface|null $propertyTypeExtractor
            service('serializer.mapping.class_discriminator_resolver')->ignoreOnInvalid(), // ClassDiscriminatorResolverInterface|null $classDiscriminatorResolver
            null, // callable|null $objectClassResolver
            [], // array $defaultContext
        ])
        ->tag('serializer.normalizer');

    $services->set('bytes_twitch_response.normalizer.subscription', SubscriptionNormalizer::class)
        ->args([
            service('serializer.mapping.class_metadata_factory'), // ClassMetadataFactoryInterface|null $classMetadataFactory
            service('serializer.name_converter.metadata_aware'), // NameConverterInterface|null $nameConverter
            service('property_info')->ignoreOnInvalid(), // PropertyTypeExtractorInterface|null $propertyTypeExtractor
            service('serializer.mapping.class_discriminator_resolver')->ignoreOnInvalid(), // ClassDiscriminatorResolverInterface|null $classDiscriminatorResolver
            null, // callable|null $objectClassResolver
            [], // array $defaultContext
        ])
        ->tag('serializer.normalizer');

    $services->set('bytes_twitch_response.normalizer.condition', ConditionNormalizer::class)
        ->args([
            service('serializer.mapping.class_metadata_factory'), // ClassMetadataFactoryInterface|null $classMetadataFactory
            service('serializer.name_converter.metadata_aware'), // NameConverterInterface|null $nameConverter
            service('property_info')->ignoreOnInvalid(), // PropertyTypeExtractorInterface|null $propertyTypeExtractor
            service('serializer.mapping.class_discriminator_resolver')->ignoreOnInvalid(), // ClassDiscriminatorResolverInterface|null $classDiscriminatorResolver
            null, // callable|null $objectClassResolver
            [], // array $defaultContext
        ])
        ->tag('serializer.normalizer');

};