<?php
class Image implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Name;
    private $ForeignKeyID;
    private $Type;
    private $IsLogo;
    private $Data;
    /**
     * Get the value of ID
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->ID;
    }
    /**
     * Set the value of ID
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
     * Get the value of Name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @param string $Name
     *
     * @return self
     */
    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

     /**
     * Get the value of ForeignKeyID
     *
     * @return int
     */
    public function getForeignKeyID(): int
    {
        return $this->ForeignKeyID;
    }

    /**
     * Set the value of ForeignKeyID
     *
     * @param int $ForeignKeyID
     *
     * @return self
     */
    public function setForeignKeyID(int $ForeignKeyID): self
    {
        $this->ForeignKeyID = $ForeignKeyID;

        return $this;
    }

     /**
     * Get the value of Type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->Type;
    }

    /**
     * Set the value of Type
     *
     * @param string $Type
     *
     * @return self
     */
    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
         /**
     * Get the value of IsLogo
     *
     * @return bool
     */
    public function getIsLogo(): bool
    {
        return $this->IsLogo;
    }

    /**
     * Set the value of IsLogo
     *
     * @param bool $IsLogo
     *
     * @return self
     */
    public function setIsLogo(bool $IsLogo): self
    {
        $this->IsLogo = $IsLogo;

        return $this;
    }
   
             /**
     * Get the value of Data
     *
     * @return string
     */
    public function getData(): string
    {
        return $this->Data;
    }

    /**
     * Set the value of Data
     *
     * @param string $Data
     *
     * @return self
     */
    public function setData(string $Data): self
    {
        $this->Data = $Data;

        return $this;
    }
    
}