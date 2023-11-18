<?php

namespace Mariusdrg\LaravelFivemApi\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class LFAService
{
    protected $ip = '0.0.0.0';

    protected $port = '30120';

    public function __construct(string $ip, int $port = 30120)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    public function getServer() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/info.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody());
    }

    public function getServerInfo() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/info.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody())->vars;
    }

    public function getLocale() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/info.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody())->vars->locale;
    }

    public function getResources() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/info.json');
        try {
            try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody())->resources;
    }

    public function getLicenseKeyToken() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/info.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody())->vars->sv_licenseKeyToken;
    }

    public function getAllPlayers() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/players.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody());
    }

    public function getOnlinePlayers() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/players.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return count(json_decode($res->getBody()));
    }

    public function getMaxPlayers() {
        $client = new Client();
        $request = new Request('GET', $this->ip.':'.$this->port.'/info.json');
        try {
            $res = $client->sendAsync($request)->wait();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return json_decode($res->getBody())->vars->sv_maxClients;
    }
}