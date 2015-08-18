<?php

/**
 * @Entity @Table(name="Trackinglog")
 */
class TrackingLog implements JsonSerializable
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $clientIP;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $remoteIP;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $forwardedIP;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $browserData;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $code;
    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $date;

    public function getId()
    {
        return $this->id;
    }

    public function getClientIP()
    {
        return $this->clientIP;
    }

    public function setClientIP($clientIPIn)
    {
        $this->clientIP = $clientIPIn;
    }

    public function getRemoteIP()
    {
        return $this->remoteIP;
    }

    public function setRemoteIP($remoteIPIn)
    {
        $this->remoteIP = $remoteIPIn;
    }

    public function getForwardedIP()
    {
        return $this->forwardedIP;
    }

    public function setForwardedIP($forwardedIPIn)
    {
        $this->forwardedIP = $forwardedIPIn;
    }

    public function getBrowserData()
    {
        return $this->browserData;
    }

    public function setBrowserData($browserDataIn)
    {
        $this->browserData = $browserDataIn;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($codeIn)
    {
        $this->code = $codeIn;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($dateIn)
    {
        $this->date = $dateIn;
    }

    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'clientIP' => $this->clientIP,
            'remoteIP' => $this->remoteIP,
            'forwardedIP' => $this->forwardedIP,                        
            'data' => $this->browserData,
            'code' => $this->code,
            'date'=> $this->date->getTimestamp() * 1000,
        );
    }

} ?>