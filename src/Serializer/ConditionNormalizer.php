<?php


namespace Bytes\TwitchResponseBundle\Serializer;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Condition;
use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Illuminate\Support\Str;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
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
    public function normalize($object, string $format = null, array $context = [])
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
    public function supportsDenormalization($data, string $type, string $format = null)
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
    public function supportsNormalization($data, string $format = null)
    {
        return ($data instanceof Condition) && parent::supportsNormalization($data, $format);
    }
}