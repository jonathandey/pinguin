<?php

namespace App\Models;

use Illuminate\Support\Str;

class PinStatus
{
    public const STATUS_QUEUED = 'queued';

    public const STATUS_PINNING = 'pinning';

    public const STATUS_PINNED = 'pinned';

    public const STATUS_FAILED = 'failed';

    /** @var string $requestid Globally unique identifier of the pin request; can be used to check the status of ongoing pinning, or pin removal*/
    private $requestid;

    // one of queued, pinning, pinned, failed
    /**
     * @var string $status
     */
    private $status;

    /** @var \DateTime $created Immutable timestamp indicating when a pin request entered a pinning service; can be used for filtering results and pagination*/
    private $created;

    /** @var \app\Models\Pin $pin */
    private $pin;

    /** @var string[] $delegates List of multiaddrs designated by pinning service for transferring any new data from external peers*/
    private $delegates;

    /** @var array<string,string> $info Optional info for PinStatus response*/
    private $info;

    /**
     * @param string $requestid
     * @param string $status
     * @param \DateTime $created
     * @param Pin $pin
     * @param string[] $delegates
     * @param string[] $info
     */
    public function __construct(
        Pin $pin,
        string $requestid = null,
        string $status = null,
        \DateTime $created = null,
        array $delegates = [],
        array $info = []
    ) {
        $this->pin = $pin;

        $this->requestid = $requestid;
        if (is_null($requestid)) {
            // @todo
            $this->requestid = Str::random(32);
        }

        $this->status = $status;
        if (is_null($status)) {
            $this->status = self::STATUS_PINNED;
        }

        $this->created = $created;
        if (is_null($created)) {
            $this->created = now()->format("Y-m-d\TH:i:s.v\Z");
        }

        $this->delegates = $delegates;
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getRequestid()
    {
        return $this->requestid;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @return Pin
     */
    public function getPin(): Pin
    {
        return $this->pin;
    }

    /**
     * @return string[]
     */
    public function getDelegates(): array
    {
        return $this->delegates;
    }

    /**
     * @return string[]
     */
    public function getInfo(): array
    {
        return $this->info;
    }

}
