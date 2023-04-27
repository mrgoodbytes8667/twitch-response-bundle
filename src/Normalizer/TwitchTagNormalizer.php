<?php


namespace Bytes\TwitchResponseBundle\Normalizer;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TagInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class TwitchTagNormalizer
 * Filters (via context) locales that are unwanted
 * key filtered_locales will cause allowed_locales to be ignored if set
 * @package Bytes\TwitchResponseBundle\Normalizer
 *
 * @example ['allowed_locales' => ['en-us'], 'filtered_locales' => ['cs-cz']]
 * @deprecated Twitch no longer has Tag objects
 */
class TwitchTagNormalizer extends ObjectNormalizer implements CacheableSupportsMethodInterface
{
    /**
     * Denormalizes data back into an object of the given class.
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
        if ((isset($context['allowed_locales']) && !empty($context['allowed_locales'])) || (isset($context['filtered_locales']) && !empty($context['filtered_locales']))) {
            foreach ($data as $key => $value) {
                switch ($key) {
                    case 'localization_names':
                    case 'localization_descriptions':
                        $data[$key] = $this->filter($value, $context['allowed_locales'] ?? [], $context['filtered_locales'] ?? []);
                        break;
                }
            }
        }

        return parent::denormalize($data, $type, $format, $context);
    }

    /**
     * @param array $data
     * @param array $allowedLocales
     * @param array $filteredLocales
     * @return array
     */
    private function filter(array $data, array $allowedLocales, array $filteredLocales)
    {
        foreach ($data as $key => $value) {
            if (!empty($filteredLocales)) {
                if (in_array($key, $filteredLocales)) {
                    unset($data[$key]);
                }
            } else {
                if (!in_array($key, $allowedLocales)) {
                    unset($data[$key]);
                }
            }
        }

        return $data;
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
        return is_subclass_of($type, TagInterface::class) && parent::supportsDenormalization($data, $type, $format);
    }
}