<?php


namespace Bytes\TwitchResponseBundle\Normalizer;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use function Symfony\Component\String\u;

/**
 * Class TwitchDateTimeNormalizer
 * Sets the created_at field format to the non-standard Twitch EventSub format for denormalization, otherwise
 * defaults to GetSetMethodNormalizer
 * @package Bytes\TwitchResponseBundle\Serializer
 */
class TwitchDateTimeNormalizer extends ObjectNormalizer
{
    /**
     * Denormalizes data back into an object of the given class.
     * Twitch seems to switch around between including milliseconds and microseconds, so this strips those out.
     *
     * @param mixed $data Data to restore
     * @param string $type The expected class to instantiate
     * @param string|null $format Format the given data was extracted from
     * @param array $context Options available to the denormalizer
     *
     * @return object|array
     *
     * @throws ExceptionInterface Occurs for all the other cases of errors
     */
    public function denormalize($data, string $type, string $format = null, array $context = []): mixed
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'created_at':
                case 'followed_at':
                case 'started_at':
                    $camelKey = u($key)->camel()->toString();
                    $createdAt = u($data[$key]);
                    //0000-00-00T00:00:00.vP
                    if (in_array($createdAt->slice(-6, 1)->toString(), ['+', '-']) || $createdAt->endsWith('Z')) {
                        if ($createdAt->endsWith('Z')) {
                            $timezone = 'Z';
                        } elseif ($createdAt->slice(-6, 1) == '+') {
                            $timezone = $createdAt->afterLast('+')->prepend('+');
                        } else {
                            $timezone = $createdAt->afterLast('-')->prepend('-');
                        }

                        if ($createdAt->containsAny('.')) {
                            $createdAt = $createdAt->before('.')->append($timezone);
                        }
                    }

                    $data[$camelKey] = (string)$createdAt;
                    unset($data[$key]);
                    break;
            }
        }

        return parent::denormalize($data, $type, $format, $context);
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
        return is_subclass_of($type, TwitchDateTimeInterface::class) && is_array($data) && parent::supportsDenormalization($data, $type, $format);
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
        return ($data instanceof TwitchDateTimeInterface) && parent::supportsNormalization($data, $format);
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
            TwitchDateTimeInterface::class => (__CLASS__ === static::class),
        ];
    }
}
