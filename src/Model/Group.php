<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Model;

use JMS\Serializer\Annotation as JMS;

class Group
{
    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("path")
     */
    private $path;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("visibility")
     */
    private $visibility;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("lfs_enabled")
     */
    private $lfsEnabled;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("avatar_url")
     */
    private $avatarUrl;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("web_url")
     */
    private $webUrl;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("request_access_enabled")
     */
    private $requestAccessEnabled;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("full_name")
     */
    private $fullName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("full_path")
     */
    private $fullPath;

    /**
     * @var int|null
     * @JMS\Type("string")
     * @JMS\SerializedName("parent_id")
     */
    private $parentId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }

    /**
     * @return bool
     */
    public function isLfsEnabled(): bool
    {
        return $this->lfsEnabled;
    }

    /**
     * @return null|string
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * @return string
     */
    public function getWebUrl(): string
    {
        return $this->webUrl;
    }

    /**
     * @return bool
     */
    public function isRequestAccessEnabled(): bool
    {
        return $this->requestAccessEnabled;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $this->fullPath;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }



}
