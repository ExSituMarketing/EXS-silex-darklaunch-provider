<?php

namespace EXS\DarklaunchProvider\Services;

/**
 * DarklaunchService class
 *
 * Check the user ip to active dark launched function.
 * Created      08/12/2015
 * @author      Lee
 * @copyright   Copyright 2015 ExSitu Marketing.
 * @access public
 */
class DarklaunchService
{

    /**
     * Ips to active dark launched function or service
     * @access private
     * @var array
     */
    private $activeIps;

    /**
     * Darlaunch service constructor
     * @return void
     * @access public
     */
    public function __construct($activeIps = array())
    {
        $this->activeIps = $activeIps;
    }

    /**
     * Active ips
     * @param string $ipaddress
     * @return boolean
     */
    public function isActiveIp($ipaddress = false)
    {
        $ipaddress = $this->hasIpAddress($ipaddress);
        if (in_array($ipaddress, $this->activeIps)) {
            return true;
        }
        return false;
    }

    /**
     * Check if ip address has been passed to the service
     * @param string $ipaddress
     * @return type
     */
    public function hasIpAddress($ipaddress = false)
    {
        if (!$ipaddress) {
            $ipaddress = $this->getUserIp();
        }
        return $ipaddress;
    }

    /**
     * Get user's IP adress
     * @return string
     */
    public function getUserIp()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }
}

// end of script
