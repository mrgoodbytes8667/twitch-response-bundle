<?php


namespace Bytes\TwitchResponseBundle\Objects\OAuth2;


use Bytes\ResponseBundle\Objects\ComparableDateInterval;
use Bytes\ResponseBundle\Token\Interfaces\TokenValidationResponseInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\ErrorTrait;
use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Validate
 * @package Bytes\TwitchResponseBundle\Objects\OAuth2
 */
class Validate implements TokenValidationResponseInterface
{
    use ErrorTrait;

    /**
     * @var string|null
     */
    #[SerializedName('login')]
    private $userName;

    /**
     * @var DateTimeInterface|null
     */
    private $expiresAt = null;

    /**
     * Validate constructor.
     * @param string|null $clientId
     * @param string|null $userName
     * @param array|null $scopes
     * @param string|null $userId
     * @param int|null $expiresIn
     */
    public function __construct(private ?string $clientId = null, ?string $userName = null, private ?array $scopes = null, private ?string $userId = null, private ?int $expiresIn = null)
    {
        $this->userName = $userName;
        if (!is_null($expiresIn)) {
            $this->setExpiresAt($expiresIn);
        }
    }

    /**
     * @param ...$args = clientId, userName, scopes, userId
     * @return static
     */
    #[Pure] public static function create(...$args): static
    {
        return new static(...$args);
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param string|null $clientId
     * @return $this
     */
    public function setClientId(?string $clientId): self
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     * @return $this
     */
    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    /**
     * @param string[]|null $scopes
     * @return $this
     */
    public function setScopes(?array $scopes): self
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return $this
     */
    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpiresIn(): ?int
    {
        return $this->expiresIn;
    }

    /**
     * @param int|null $expiresIn
     * @return $this
     */
    public function setExpiresIn(?int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        if (!is_null($expiresIn)) {
            $this->setExpiresAt($expiresIn);
        }
        
        return $this;
    }

    /**
     * @param ...$args
     * @return bool
     */
    public function isMatch(...$args): bool
    {
        return $this->hasMatchingClientId($args['clientId'] ?? null) &&
            $this->hasMatchingUserName($args['userName'] ?? null) &&
            $this->hasMatchingUserId($args['userId'] ?? null);
    }

    /**
     * @param string|null $clientId
     * @return bool
     */
    public function hasMatchingClientId(?string $clientId): bool
    {
        return $this->clientId === $clientId;
    }

    /**
     * @param string|null $userName
     * @return bool
     */
    public function hasMatchingUserName(?string $userName): bool
    {
        return $this->userName === $userName;
    }

    /**
     * @param string|null $id
     * @return bool
     */
    public function hasMatchingUserId(?string $id): bool
    {
        return $this->userId === $id;
    }

    /**
     * @return bool
     */
    public function hasExpired(): bool
    {
        return ($this->expiresIn ?? 0) <= 0 || $this->status === Response::HTTP_UNAUTHORIZED;
    }

    /**
     * Is this token an app/bot token?
     * @return bool
     */
    public function isAppToken(): bool
    {
        if (empty($this->clientId)) {
            throw new InvalidArgumentException('A client id must be present for the comparison to be possible.');
        }

        return empty($this->userName) && empty($this->scopes) && empty($this->userId);
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getExpiresAt(): ?DateTimeInterface
    {
        return $this->expiresAt;
    }

    /**
     * @param DateTimeInterface|DateInterval|int|null $expiresAt
     * @return $this
     */
    protected function setExpiresAt(DateTimeInterface|DateInterval|int|null $expiresAt): self
    {
        if (!is_null($expiresAt)) {
            if (is_int($expiresAt)) {
                $expiresAt = ComparableDateInterval::secondsToInterval($expiresAt);
            }
            
            if ($expiresAt instanceof DateInterval) {
                $now = new DateTimeImmutable();
                $expiresAt = $now->add($expiresAt);
            }
        }
        
        $this->expiresAt = $expiresAt;
        return $this;
    }
}