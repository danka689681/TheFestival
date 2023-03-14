<?php
// #[AllowDynamicProperties]
class HistoryContent implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Name;
    private $Content;

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
     * Get the value of Name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * Set the value of name
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
     * Get the value of Content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->Content;
    }

    /**
     * Set the value of Content
     *
     * @param string $Content
     *
     * @return self
     */
    public function setContent(string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }
}