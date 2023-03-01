<?php
class Token implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $UserID;
    private $Selector;
    private $Token;
    private $Expires;
    private $Type;
/**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->ID;
    }

    /**
     * Set the value of id
     *
     * @param int $ID
     *
     * @return self
     */
    public function setId(int $ID): self
    {
        $this->ID = $ID;

        return $this;
    }
/**
     * Get the value of UserID
     *
     * @return int
     */
    public function getUserID(): int
    {
        return $this->UserID;
    }

    /**
     * Set the value of UserID
     *
     * @param int $UserID
     *
     * @return self
     */
    public function setUserID(int $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

      /**
     * Get the value of Selector
     *
     * @return string
     */
    public function getSelector(): string
    {
        return $this->Selector;
    }

    /**
     * Set the value of Selector
     *
     * @param string $Selector
     *
     * @return self
     */
    public function setSelector(string $Selector): self
    {
        $this->Selector = $Selector;

        return $this;
    }

     /**
     * Get the value of Token
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->Token;
    }

    /**
     * Set the value of email
     *
     * @param string $Token
     *
     * @return self
     */
    public function setToken(string $Token): self
    {
        $this->Token = $Token;

        return $this;
    }

     /**
     * Get the value of Expires
     *
     * @return string
     */
    public function getExpires(): string
    {
        return $this->Expires;
    }

    /**
     * Set the value of Expires
     *
     * @param string $Expires
     *
     * @return self
     */
    public function setExpires(string $Expires): self
    {
        $this->Expires = $Expires;

        return $this;
    }
         /**
     * Get the value of Type
     *
     * @return bool
     */
    public function getType(): bool
    {
        return $this->Type;
    }

    /**
     * Set the value of Type
     *
     * @param bool $Type
     *
     * @return self
     */
    public function setType(bool $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
   
}