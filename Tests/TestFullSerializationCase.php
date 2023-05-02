<?php


namespace Bytes\TwitchResponseBundle\Tests;


use Bytes\EnumSerializerBundle\Serializer\Normalizer\EnumNormalizer;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\TwitchResponseBundle\Normalizer\TwitchDateTimeNormalizer;
use Bytes\TwitchResponseBundle\Serializer\ConditionNormalizer;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Messenger\Transport\Serialization\Normalizer\FlattenExceptionNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\MimeMessageNormalizer;
use Symfony\Component\Serializer\Normalizer\ProblemNormalizer;
use Symfony\Component\Serializer\Normalizer\UidNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class TestFullSerializationCase extends FixtureTestCase
{
    use TestSerializerTrait;

    protected ?Serializer $serializer = null;

    /**
     * Normalizers currently used as of v6.2.10:
     * @see UnwrappingDenormalizer
     * @see EnumNormalizer
     * @see TwitchDateTimeNormalizer
     * @see ConditionNormalizer
     *  see DoctrineObjectNormalizer
     * @see FlattenExceptionNormalizer
     * @see ProblemNormalizer
     * @see UidNormalizer
     * @see DateTimeNormalizer
     * @see ConstraintViolationListNormalizer
     * @see MimeMessageNormalizer
     * @see DateTimeZoneNormalizer
     * @see DateIntervalNormalizer
     * @see FormErrorNormalizer
     * @see BackedEnumNormalizer
     * @see DataUriNormalizer
     * @see JsonSerializableNormalizer
     * @see ArrayDenormalizer
     * @see ObjectNormalizer
     *
     * @before
     * @return void
     */
    public function setupSerializer(): void
    {
        $this->setupObjectNormalizerParts();
        $this->serializer = $this->createSerializer(appendNormalizers: [
            new EnumNormalizer(),
            new TwitchDateTimeNormalizer(classMetadataFactory: $this->classMetadataFactory, nameConverter: $this->metadataAwareNameConverter, propertyAccessor: $this->propertyAccessor, propertyTypeExtractor: $this->propertyInfo, classDiscriminatorResolver: $this->classDiscriminatorFromClassMetadata),
            new ConditionNormalizer(classMetadataFactory: $this->classMetadataFactory, nameConverter: $this->metadataAwareNameConverter, propertyTypeExtractor: $this->propertyInfo, classDiscriminatorResolver: $this->classDiscriminatorFromClassMetadata),
            //new DoctrineObjectNormalizer(),
            new FlattenExceptionNormalizer(),
            new ProblemNormalizer(),
            new UidNormalizer(),
            new DateTimeNormalizer(),
            new ConstraintViolationListNormalizer(nameConverter: $this->metadataAwareNameConverter),
            //new MimeMessageNormalizer(),
            new DateTimeZoneNormalizer(),
            new DateIntervalNormalizer(),
            //new FormErrorNormalizer()
            new BackedEnumNormalizer(),
            new DataUriNormalizer(),
            new JsonSerializableNormalizer(classMetadataFactory: $this->classMetadataFactory, nameConverter: $this->metadataAwareNameConverter),
            new ArrayDenormalizer(),
        ]);
    }

    /**
     * @after
     * @return void
     */
    public function tearDownSerializer(): void
    {
        $this->serializer = null;
        $this->metadataAwareNameConverter = null;
        $this->classDiscriminatorFromClassMetadata = null;
        $this->classMetadataFactory = null;
        $this->serializerExtractor = null;
        $this->phpDocExtractor = null;
        $this->reflectionExtractor = null;
        $this->propertyInfo = null;
        $this->propertyAccessor = null;
        $this->normalizers = null;
    }
}
