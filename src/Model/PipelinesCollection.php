<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Model;

class PipelinesCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Pipeline[]
     */
    private $pipelines = [];

    /**
     * @param Pipeline[] $pipelines
     */
    public function __construct(array $pipelines = [])
    {
        $this->pipelines = $pipelines;
    }

    /**
     * @return Pipeline[]
     */
    public function getActive(): array
    {
        return \array_filter(
            $this->pipelines,
            function (Pipeline $pipeline) {
                return $pipeline->isRunning() || $pipeline->isPending();
            }
        );
    }

    /**
     * @param Pipeline $pipeline
     */
    public function add(Pipeline $pipeline)
    {
        $this->pipelines[] = $pipeline;
    }

    /**
     * @param Pipeline[] $pipelines
     */
    public function set(array $pipelines)
    {
        foreach ($pipelines as $pipeline) {
            $this->add($pipeline);
        }
    }

    /**
     * @param Pipeline[] $pipelines
     */
    public function replace(array $pipelines)
    {
        $this->pipelines = [];
        $this->set($pipelines);
    }

    /**
     * @return Pipeline|null
     */
    public function first(): ?Pipeline
    {
        return !$this->isEmpty() ? \reset($this->pipelines) : null;
    }

    /**
     * @return Pipeline|null
     */
    public function last(): ?Pipeline
    {
        return !$this->isEmpty() ? \end($this->pipelines) : null;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->pipelines);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return \count($this->pipelines);
    }
}
