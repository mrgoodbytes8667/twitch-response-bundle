<?php


namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Bytes\ResponseBundle\Handler\Locator;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Normalizer\TwitchTagNormalizer;
use Bytes\TwitchResponseBundle\Request\EventSubSignature;
use Bytes\TwitchResponseBundle\Request\SignatureInterface;
use Bytes\TwitchResponseBundle\Serializer\ConditionNormalizer;

/**
 * @param ContainerConfigurator $container
 */
return static function (ContainerConfigurator $container) {

    $services = $container->services();

    $services->set('bytes_twitch_response.signature.eventsub', EventSubSignature::class)
        ->public()
        ->args([''])
        ->tag('bytes_twitch_response.signature')
        ->alias(SignatureInterface::class . ' $eventSubSignature', 'bytes_twitch_response.signature.eventsub');

    $services->set('bytes_twitch_response.normalizer.twitchdatetime', TwitchDateTimeNormalizer::class)
        ->args([
            service('serializer.mapping.class_metadata_factory'), // ClassMetadataFactoryInterface|null $classMetadataFactory
            service('serializer.name_converter.metadata_aware'), // NameConverterInterface|null $nameConverter
            service('property_accessor')->ignoreOnInvalid(), // \Symfony\Component\PropertyAccess\PropertyAccessorInterface|null $propertyTypeExtractor
            service('property_info')->ignoreOnInvalid(), // PropertyTypeExtractorInterface|null $propertyTypeExtractor
            service('serializer.mapping.class_discriminator_resolver')->ignoreOnInvalid(), // ClassDiscriminatorResolverInterface|null $classDiscriminatorResolver
            null, // callable|null $objectClassResolver
            [], // array $defaultContext
        ])
        ->tag('serializer.normalizer');

    $services->set('bytes_twitch_response.normalizer.twitchtag', TwitchTagNormalizer::class)
        ->args([
            service('serializer.mapping.class_metadata_factory'), // ClassMetadataFactoryInterface|null $classMetadataFactory
            service('serializer.name_converter.metadata_aware'), // NameConverterInterface|null $nameConverter
            service('property_accessor')->ignoreOnInvalid(), // \Symfony\Component\PropertyAccess\PropertyAccessorInterface|null $propertyTypeExtractor
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

    $services->set('bytes_twitch_response.locator.signature', Locator::class)
        ->args([tagged_locator('bytes_twitch_response.signature', 'key', 'getDefaultIndexName')])
        ->deprecate('mrgoodbytes8667/twitch-response-bundle', '0.5.6', 'The "%service_id%" is deprecated: Twitch has deprecated webhooks, leaving just one method to locate. Use bytes_twitch_response.signature.eventsub directly.')
        ->public();

    $services->alias(Locator::class . ' $twitchSignatureLocator', 'bytes_twitch_response.locator.signature');

};