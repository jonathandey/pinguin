# PHP IPFS Pinning Service (Codename: Pinguin)

This project is still under active development.

### Development

For development purposes I have been exposing a remote IPFS server locally to interact with, using:

`ssh -NL 45001:localhost:5001 remote_server`

Then setting the env variables:

```
IPFS_SERVER=http://127.0.0.1
IPFS_PORT=45001
```

You should then add this service to your local IPFS instance either by using the UI or CLI.

`ipfs pin remote service add pinguin http://your_local_address ANY_KEY_HERE`

At the moment keys aren't implemented. Laravel packages Sanctum, which would be a perfect fit for this.

It's a good idea to increase your webservers request timeout, to better handle the client pinning request.

E.g.

```
keepalive_timeout 999;

proxy_read_timeout 999;
proxy_connect_timeout 999;
proxy_send_timeout 999;
```

### TODO
- General UI (using Inertia): login/register
- Relationship between pins and users
- Relationship between pin statuses and users
- Queue pin creation
- Plus other things
