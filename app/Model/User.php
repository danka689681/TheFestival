<?php
 #[AllowDynamicProperties]
class User implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
private $id;
private $email;
private $password;
private $isAdmin;
/**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

     /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

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
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @param bit $isAdmin
     *
     * @return self
     */
    public function setIsAdmin(string $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }
}