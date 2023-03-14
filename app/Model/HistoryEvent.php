<?php
// #[AllowDynamicProperties]
class HistoryEvent implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Date;
    private $StartTime;
    private $EndTime;
    private $Price;
    private $Seats;
    private $Language;
    private $Guide;


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
     * Get the value of Date
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @param string $Date
     *
     * @return self
     */
    public function setDate(string $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
    
    /**
     * Get the value of StartTime
     *
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->StartTime;
    }

    /**
     * Set the value of StartTime
     *
     * @param string $StartTime
     *
     * @return self
     */
    public function setStartTime(string $StartTime): self
    {
        $this->StartTime = $StartTime;

        return $this;
    }

       /**
     * Get the value of EndTime
     *
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->EndTime;
    }

    /**
     * Set the value of EndTime
     *
     * @param string $EndTime
     *
     * @return self
     */
    public function setEndTime(string $EndTime): self
    {
        $this->EndTime = $EndTime;

        return $this;
    }

      /**
     * Get the value of Price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->Price;
    }

    /**
     * Set the value of Price
     *
     * @param float $Price
     *
     * @return self
     */
    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

     /**
     * Get the value of Seats
     *
     * @return int
     */
    public function getSeats(): int
    {
        return $this->Seats;
    }

    /**
     * Set the value of Seats
     *
     * @param int $Seats
     *
     * @return self
     */
    public function setSeats(string $Seats): self
    {
        $this->Seats = $Seats;

        return $this;
    }

    //Language 
    
     /**
     * Get the value of Language
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->Language;
    }

    /**
     * Set the value of Language
     *
     * @param string $Language
     *
     * @return self
     */
    public function setLanguage(string $Language): self
    {
        $this->Language = $Language;

        return $this;
    }
    //Guide
    
     /**
     * Get the value of Guide
     *
     * @return string
     */
    public function getGuide(): string
    {
        return $this->Guide;
    }

    /**
     * Set the value of Guide
     *
     * @param string $Guide
     *
     * @return self
     */
    public function setGuide(string $Guide): self
    {
        $this->Guide = $Guide;

        return $this;
    }
 
}
?>