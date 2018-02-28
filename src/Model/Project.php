<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Model;

use JMS\Serializer\Annotation as JMS;

class Project
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
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    private $name;

    /**
     * @var PipelinesCollection
     */
    private $pipelines;

    /**
     * @JMS\PostDeserialize
     */
    public function __construct()
    {
        $this->pipelines = new PipelinesCollection();
    }

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return PipelinesCollection
     */
    public function getPipelines(): PipelinesCollection
    {
        return $this->pipelines;
    }

    /**
     * @param Pipeline[] $pipelines
     * @return Project
     */
    public function setPipelines(array $pipelines): Project
    {
        $this->pipelines->set($pipelines);

        return $this;
    }
}
