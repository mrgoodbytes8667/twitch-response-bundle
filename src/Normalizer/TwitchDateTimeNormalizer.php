<?php


namespace Bytes\TwitchResponseBundle\Normalizer;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Illuminate\Support\Str;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use function Symfony\Component\String\u;

/**
 * Class SubscriptionNormalizer
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
                    $createdAt = Str::of($data[$key]);
                    //0000-00-00T00:00:00.vP
                    $timezone = $createdAt->when($createdAt->substr(-6, 1) == '+' || $createdAt->substr(-6, 1) == '-' || $createdAt->endsWith('Z'), function ($string) {
                        if ($string->endsWith('Z')) {
                            return 'Z';
                        } elseif ($string->substr(-6, 1) == '+') {
                            return $string->afterLast('+')->prepend('+');
                        } else {
                            return $string->afterLast('-')->prepend('-');
                        }
                    });
                    $createdAt = $createdAt
                        ->when($createdAt->contains('.'), function ($string) use ($timezone) {
                            return $string->before('.')->append($timezone);
                        });

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
}