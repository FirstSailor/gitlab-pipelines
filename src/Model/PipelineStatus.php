<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Model;

final class PipelineStatus
{
    public const RUNNING = 'running';
    public const PENDING = 'pending';
    public const SUCCESS = 'success';
    public const FAILED = 'failed';
    public const CANCELED = 'canceled';
    public const SKIPPED = 'skipped';

    /**
     * PipelineStatus constructor.
     */
    private function __construct()
    {
    }
}
