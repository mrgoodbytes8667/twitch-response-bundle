<?php


namespace Bytes\TwitchResponseBundle\Serializer;


use Bytes\TwitchResponseBundle\Objects\EventSub\Subscription\Subscription;
use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Illuminate\Support\Str;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

trigger_deprecation('mrgoodbytes8667/twitch-response-bundle', '0.3.0', 'The "%s" normalizer is deprecated, use "%s" instead.', 'Bytes\TwitchResponseBundle\Serializer\SubscriptionNormalizer', TwitchDateTimeInterface::class);

/**
 * Class SubscriptionNormalizer
 * Sets the created_at field format to the non-standard Twitch EventSub format for denormalization, otherwise
 * defaults to GetSetMethodNormalizer
 * @package Bytes\TwitchResponseBundle\Serializer
 *
 * @deprecated v0.3.0 Use "\Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface" instead.
 *
 * @see TwitchDateTimeInterface
 */
class SubscriptionNormalizer extends GetSetMethodNormalizer
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
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        if (array_key_exists('created_at', $data)) {
            $createdAt = Str::of($data['created_at']);
            $createdAt = $createdAt
                ->when($createdAt->contains('.'), function ($string) {
                    return $string->before('.')->append('Z');
                });

            $data['createdAt'] = (string)$createdAt;
            unset($data['created_at']);
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
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return ($type == Subscription::class) && parent::supportsDenormalization($data, $type, $format);
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
        return ($data instanceof Subscription) && parent::supportsNormalization($data, $format);
    }
}