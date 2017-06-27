<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model\DeleteByQuery;

class DeleteByQueryResponse
{

    /**
     * @var array
     */
    private $originalResponse;

    /**
     * The number of milliseconds from start to end of the whole operation.
     *
     * @var int
     */
    private $took;

    /**
     * The number of documents that were successfully deleted.
     *
     * @var int
     */
    private $deleted;

    /**
     * The number of scroll responses pulled back by the the delete by query.
     *
     * @var int
     */
    private $batches;

    /**
     * The number of version conflicts that the delete by query hit.
     *
     * @var int
     */
    private $versionConflicts;

    /**
     * The number of retries that the delete by query did in response to a full queue.
     *
     * @var
     */
    private $retries;

    /**
     * Number of milliseconds the request slept to conform to requests_per_second.
     *
     * @var int
     */
    private $throttledMillis;

    /**
     * Total number
     *
     * @var int
     */
    private $total;

    /**
     * Array of all indexing failures. If this is non-empty then the request aborted because of those failures.
     *
     * @var array
     */
    private $failures;


    /**
     * @param array $response
     */
    public function __construct(array $response = [])
    {
        $this->took = $response['took'] ?? 0;
        $this->deleted = $response['deleted'] ?? 0;
        $this->batches = $response['batches'] ?? 0;
        $this->versionConflicts = $response['version_conflicts'] ?? 0;
        $this->retries = new Retries($response['retries'] ?? []);
        $this->throttledMillis = $response['throttled_millis'] ?? 0;
        $this->total = $response['total'] ?? 0;
        $this->failures = $response['failures'] ?? 0;
        $this->originalResponse = $response;
    }

    /**
     * @return int
     */
    public function getTook(): int
    {
        return $this->took;
    }

    /**
     * @return int
     */
    public function getDeleted(): int
    {
        return $this->deleted;
    }

    /**
     * @return int
     */
    public function getBatches(): int
    {
        return $this->batches;
    }

    /**
     * @return int
     */
    public function getVersionConflicts(): int
    {
        return $this->versionConflicts;
    }

    /**
     * @return mixed
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * @return int
     */
    public function getThrottledMillis(): int
    {
        return $this->throttledMillis;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return array
     */
    public function getFailures(): array
    {
        return $this->failures;
    }

    /**
     * @return array
     */
    public function getOriginalResponse()
    {
        return $this->originalResponse;
    }
}
