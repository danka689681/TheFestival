<?php
// #[AllowDynamicProperties]
class User implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Name;
    private $Email;
    private $password;
    private $IsAdmin;
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
     * Get the value of isAdmin
     *
     * @return bit
     */
    public function getIsAdmin(): string
    {
        return $this->IsAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @param bit $IsAdmin
     *
     * @return self
     */
    public function setIsAdmin(string $IsAdmin): self
    {
        $this->IsAdmin = $IsAdmin;

        return $this;
    }
           /**
     * Get the value of RegistrationDate
     *
     * @return DateTime
     */
    public function getRegistrationDate(): string
    {
        return $this->RegistrationDate;
    }

    /**
     * Set the value of RegistrationDate
     *
     * @param DateTime $RegistrationDate
     *
     * @return self
     */
    public function setRegistrationDate(DateTime $RegistrationDate): self
    {
        $this->RegistrationDate = $RegistrationDate;

        return $this;
    }
}