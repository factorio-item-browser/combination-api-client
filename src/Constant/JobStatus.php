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
    /**
     * The job is queued and waiting for its turn.
     */
    public const QUEUED = 'queued';

    /**
     * The mods required for the jobs are currently downloaded.
     */
    public const DOWNLOADING = 'downloading';

    /**
     * The job is currently processed.
     */
    public const PROCESSING = 'processing';

    /**
     * The data of the job is currently uploaded to the server.
     */
    public const UPLOADING = 'uploading';

    /**
     * The data of the job has been uploaded, and it is waiting to get imported.
     */
    public const UPLOADED = 'uploaded';

    /**
     * The data of the job is currently getting imported into the database.
     */
    public const IMPORTING = 'importing';

    /**
     * The job is completed.
     */
    public const DONE = 'done';

    /**
     * The job failed.
     */
    public const ERROR = 'error';
}
