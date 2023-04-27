<?php


namespace Bytes\TwitchResponseBundle\Objects\Users;


use Bytes\TwitchResponseBundle\Objects\Interfaces\TwitchDateTimeInterface;
use Bytes\TwitchResponseBundle\Objects\Interfaces\UserInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class User
 * @package Bytes\TwitchResponseBundle\Objects\Users
 */
class User implements UserInterface, TwitchDateTimeInterface
{
    /**
     * User’s broadcaster type: "partner", "affiliate", or "".
     * @var string|null = ['partner', 'affiliate', ''][$any]
     */
    protected $broadcaster_type;

    /**
     * User’s channel description.
     * @var string|null
     */
    protected $description;

    /**
     * User’s display name.
     * @var string|null
     */
    protected $display_name;

    /**
     * User’s email address. Returned if the request includes the user:read:email scope.
     * @var string|null
     */
    protected $email;

    /**
     * User’s ID.
     * @var string|null
     */
    protected $id;

    /**
     * User’s login name.
     * @var string|null
     */
    protected $login;

    /**
     * URL of the user’s offline image.
     * @var string|null
     */
    protected $offline_image_url;

    /**
     * URL of the user’s profile image.
     * @var string|null
     */
    protected $profile_image_url;

    /**
     * User’s type: "staff", "admin", "global_mod", or "".
     * @var string|null = ['staff', 'admin', 'global_mod', ''][$any]
     */
    protected $type;

    /**
     * Total number of views of the user’s channel.
     * @var int|null
     */
    protected $view_count;

    /**
     * @var \DateTimeInterface|null
     */
    protected $created_at;

    /**
     * @param string $id
     * @param string|null $login
     * @param string|null $broadcasterType = ['partner', 'affiliate', ''][$any]
     * @param string|null $description
     * @param string|null $displayName
     * @param string|null $email
     * @param string|null $offlineImageUrl
     * @param string|null $profileImageUrl
     * @param string|null $type = ['staff', 'admin', 'global_mod', ''][$any]
     * @param int|null $viewCount
     * @param \DateTimeInterface|null $createdAt
     * @return UserInterface
     */
    public static function make(string $id, ?string $login = null, ?string $broadcasterType = null, ?string $description = null, ?string $displayName = null, ?string $email = null, ?string $offlineImageUrl = null, ?string $profileImageUrl = null, ?string $type = null, ?int $viewCount = null, ?\DateTimeInterface $createdAt = null): UserInterface
    {
        $static = new static();
        $static->setUserId($id);
        if (!empty($login)) {
            $static->setLogin($login);
        }
        
        if (!empty($broadcasterType)) {
            $static->setBroadcasterType($broadcasterType);
        }
        
        if (!empty($description)) {
            $static->setDescription($description);
        }
        
        if (!empty($displayName)) {
            $static->setDisplayName($displayName);
        }
        
        if (!empty($email)) {
            $static->setEmail($email);
        }
        
        if (!empty($offlineImageUrl)) {
            $static->setOfflineImageUrl($offlineImageUrl);
        }
        
        if (!empty($profileImageUrl)) {
            $static->setProfileImageUrl($profileImageUrl);
        }
        
        if (!empty($type)) {
            $static->setType($type);
        }
        
        if (!is_null($viewCount)) {
            $static->setViewCount($viewCount);
        }
        
        if (!is_null($createdAt)) {
            $static->setCreatedAt($createdAt);
        }
        
        return $static;
    }

    /**
     * @return string|null
     */
    public function getBroadcasterType(): ?string
    {
        return $this->broadcaster_type;
    }

    /**
     * @param string|null $broadcaster_type = ['partner', 'affiliate', ''][$any]
     * @return $this
     */
    public function setBroadcasterType(?string $broadcaster_type): self
    {
        $this->broadcaster_type = $broadcaster_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->display_name ?? '';
    }

    /**
     * @param string|null $display_name
     * @return $this
     */
    public function setDisplayName(?string $display_name): self
    {
        $this->display_name = $display_name;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasEmail(): bool
    {
        return !empty($this->email);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    #[SerializedName('id')]
    public function getUserId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setUserId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     * @return $this
     */
    public function setLogin(?string $login): self
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOfflineImageUrl(): ?string
    {
        return $this->offline_image_url;
    }

    /**
     * @param string|null $offline_image_url
     * @return $this
     */
    public function setOfflineImageUrl(?string $offline_image_url): self
    {
        $this->offline_image_url = $offline_image_url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfileImageUrl(): ?string
    {
        return $this->profile_image_url;
    }

    /**
     * @param string|null $profile_image_url
     * @return $this
     */
    public function setProfileImageUrl(?string $profile_image_url): self
    {
        $this->profile_image_url = $profile_image_url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type = ['staff', 'admin', 'global_mod', ''][$any]
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getViewCount(): int
    {
        return $this->view_count ?? 0;
    }

    /**
     * @param int|null $view_count
     * @return $this
     */
    public function setViewCount(?int $view_count = 0): self
    {
        $this->view_count = $view_count ?? 0;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * @param \DateTimeInterface|null $created_at
     * @return $this
     */
    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }
}