<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\EnumSerializerBundle\Serializer\Normalizer\EnumNormalizer;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ProblemNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class TestSerializationCase extends TestCase
{
    protected function createSerializer(bool $includeEnumNormalizer = true, bool $includeObjectNormalizer = true, array $prependNormalizers = [], array $appendNormalizers = [])
    {
        if (empty($appendNormalizers)) {
            $appendNormalizers = [
                new ProblemNormalizer(),
                new JsonSerializableNormalizer(),
                new DateTimeNormalizer(),
                new ConstraintViolationListNormalizer(),
                new DateTimeZoneNormalizer(),
                new DateIntervalNormalizer(),
                new DataUriNormalizer(),
                new ArrayDenormalizer(),
            ];
        }

        $encoders = [new XmlEncoder(), new JsonEncoder(), new CsvEncoder()];
        $normalizers = $this->getNormalizers($includeEnumNormalizer, $includeObjectNormalizer, array_merge($prependNormalizers, [new UnwrappingDenormalizer()]), $appendNormalizers);

        return new Serializer($normalizers, $encoders);
    }

    /**
     * @param bool $includeEnumNormalizer
     * @param bool $includeObjectNormalizer
     * @param array $prependNormalizers
     * @param array $appendNormalizers
     * @return array
     */
    protected function getNormalizers(bool $includeEnumNormalizer = true, bool $includeObjectNormalizer = true, array $prependNormalizers = [], array $appendNormalizers = [])
    {
        $normalizers = $prependNormalizers;
        if ($includeEnumNormalizer || $includeObjectNormalizer || !empty($appendNormalizers)) {
            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

            $objectNormalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, new PropertyAccessor(), new ReflectionExtractor(), new ClassDiscriminatorFromClassMetadata($classMetadataFactory));
            if ($includeEnumNormalizer) {
                $normalizers[] = new EnumNormalizer($objectNormalizer);
            }
            
            foreach ($appendNormalizers as $normalizer) {
                $normalizers[] = $normalizer;
            }
            
            if ($includeObjectNormalizer) {
                $normalizers[] = $objectNormalizer;
            }
        }
        
        return $normalizers;
    }

    protected function buildFixtureResponse(string $value, string $label = null)
    {
        return json_encode([
            'label' => $label ?? $value,
            'value' => $value
        ]);
    }

    /**
     * @param string $file
     * @return string
     */
    public static function getFixturesFile(string $file)
    {
        return __DIR__ . '/Fixtures/' . $file;
    }
}