<?php
// #[AllowDynamicProperties]
class User implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Name;
    private $Email;
    private $password;
    private $Role;

    private $RegistrationDate;
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
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * Set the value of email
     *
     * @param string $Email
     *
     * @return self
     */
    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

     /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    
    /**
     * Get the value of Role
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->Role;
    }

    /**
     * Set the value of Role
     *
     * @param string $Role
     *
     * @return self
     */
    public function setRole(string $Role): self
    {
        $this->Role = $Role;

        return $this;
    }
   
             /**
     * Get the value of RegistrationDate
     *
     * @return string
     */
    public function getRegistrationDate(): string
    {
        return $this->RegistrationDate;
    }

    /**
     * Set the value of RegistrationDate
     *
     * @param string $RegistrationDate
     *
     * @return self
     */
    public function setRegistrationDate(string $RegistrationDate): self
    {
        $this->RegistrationDate = $RegistrationDate;

        return $this;
    }
    
}