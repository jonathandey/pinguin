<?php

namespace App\Models;

class Pin
{
    /** @var string $cid Content Identifier (CID) to be pinned recursively*/
    private $cid;

    /** @var string $name Optional name for pinned data; can be used for lookups later*/
    private $name;

    /** @var string[] $origins Optional list of multiaddrs known to provide the data*/
    private $origins;

    /** @var array<string,string> $meta Optional metadata for pin object*/
    private $meta;

    /**
     * @param string $cid
     * @param string $name
     * @param string[] $origins
     * @param string[] $meta
     */
    public function __construct(string $cid, string $name = null, array $origins = [], array $meta = [])
    {
        $this->cid = $cid;
        $this->name = $name;
        $this->origins = $origins;
        $this->meta = $meta;
    }

    /**
     * @return string
     */
    public function getCid(): string
    {
        return $this->cid;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string[]
     */
    public function getOrigins(): array
    {
        return $this->origins;
    }

    /**
     * @return string[]
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

}
