<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Model;

use JMS\Serializer\Annotation as JMS;

class Pipeline
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
     * @JMS\SerializedName("sha")
     */
    private $sha;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("ref")
     */
    private $ref;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    private $status;

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
    public function getSha(): string
    {
        return $this->sha;
    }

    /**
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isRunning(): bool
    {
        return $this->status === PipelineStatus::RUNNING;
    }

    /**
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->status === PipelineStatus::PENDING;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->status === PipelineStatus::SUCCESS;
    }

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return $this->status === PipelineStatus::FAILED;
    }

    /**
     * @return bool
     */
    public function isCanceled(): bool
    {
        return $this->status === PipelineStatus::CANCELED;
    }

    /**
     * @return bool
     */
    public function isSkipped(): bool
    {
        return $this->status === PipelineStatus::SKIPPED;
    }
}
