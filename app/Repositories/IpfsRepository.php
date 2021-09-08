<?php

namespace App\Repositories;

use Ipfs\Ipfs;

abstract class IpfsRepository
{
    /**
     * @var Ipfs $ipfsClient
     */
    protected $ipfsClient;

    /**
     * @param Ipfs $ipfsClient
     */
    public function __construct(Ipfs $ipfsClient)
    {
        $this->ipfsClient = $ipfsClient;
    }

}
