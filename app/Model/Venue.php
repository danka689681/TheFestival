<?php
// #[AllowDynamicProperties]
class Venue implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Name;
    private $MapURL;
   
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
     * Set the value of email
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
     * Get the value of MapURL
     *
     * @return string
     */
    public function getMapURL(): string
    {
        return $this->MapURL;
    }

    /**
     * Set the value of MapURL
     *
     * @param string $MapURL
     *
     * @return self
     */
    public function setMapURL(string $MapURL): self
    {
        $this->MapURL = $MapURL;

        return $this;
    }

    }