<?php

declare(strict_types=1);

namespace FactorioItemBrowser\CombinationApi\Client\Constant;

/**
 * The interface holding the job status values.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 */
interface JobStatus
{
    public const QUEUED = 'queued';
    public const DOWNLOADING = 'downloading';
    public const PROCESSING = 'processing';
    public const UPLOADING = 'uploading';
    public const UPLOADED = 'uploaded';
    public const IMPORTING = 'importing';
    public const DONE = 'done';
    public const ERROR = 'error';
}
