<?php

namespace Vultr\Adapter;

interface AdapterInterface
{
    public function get($url, array $args = array());

    public function post($url, array $args, $getCode = false);

    public function delete($url, array $args = array(), $getCode = false);

    public function put($url, array $args, $getCode = false);

    public function patch($url, array $args, $getCode = false);

    public function setEndpoint($endpoint);
}
