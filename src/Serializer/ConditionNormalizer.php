<?php


namespace Bytes\TwitchResponseBundle\Serializer;


use ArrayObject;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

/**
 * Class ConditionNormalizer
 * @package Bytes\TwitchResponseBundle\Serializer
 */
class ConditionNormalizer extends GetSetMethodNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, string $format = null, array $context = []): array|string|int|float|bool|ArrayObject|null
    {
        return parent::normalize($object, $format, $context);
    }

    /**
     * Checks whether the given class is supported for denormalization by this normalizer.
     *
     * @param mixed $data Data to denormalize from
     * @param string $type The class to which the data should be denormalized
     * @param string|null $format The format being deserialized from
     *
     * @return bool
     */
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        return ($type == Condition::class) && parent::supportsDenormalization($data, $type, $format);
    }

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param mixed $data Data to normalize
     * @param string|null $format The format being (de-)serialized from or into
     *
     * @return bool
     */
    public function supportsNormalization($data, string $format = null): bool
    {
        return ($data instanceof Condition) && parent::supportsNormalization($data, $format);
    }

    /**
     * Returns the types potentially supported by this [de]normalizer.
     *
     * For each supported formats (if applicable), the supported types should be
     * returned as keys, and each type should be mapped to a boolean indicating
     * if the result of supports[Den|N]ormalization() can be cached or not
     * (a result cannot be cached when it depends on the context or on the data.)
     * A null value means that the [de]normalizer does not support the corresponding
     * type.
     *
     * Use type "object" to match any classes or interfaces,
     * and type "*" to match any types.
     *
     * @return array<class-string|'*'|'object'|string, bool|null>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [
            Condition::class => (__CLASS__ === static::class),
        ];
    }
}
