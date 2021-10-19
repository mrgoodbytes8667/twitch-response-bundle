<?php

namespace Bytes\TwitchResponseBundle\Objects\EventSub\Traits;

trait UserLoginTrait
{
    /**
     * @var string|null
     */
    private $user_login;

    /**
     * @return string|null
     */
    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    /**
     * @param string|null $user_login
     * @return $this
     */
    public function setUserLogin(?string $user_login): self
    {
        $this->user_login = $user_login;
        return $this;
    }
}