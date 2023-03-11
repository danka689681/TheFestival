<?php
// #[AllowDynamicProperties]
require __DIR__ . '/Image.php';

class Artist implements JsonSerializable {
    public function jsonSerialize() : mixed { return get_object_vars($this); }
    private $ID;
    private $Name;
    private $Description;
    private $YouTube;
    private $Spotify;
    private $DemoSong;
    private $Logo;
    private $Images;
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
     * Get the value of Description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @param string $Description
     *
     * @return self
     */
    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

     /**
     * Get the value of YouTube
     *
     * @return string
     */
    public function getYouTube(): string
    {
        return $this->YouTube;
    }

    /**
     * Set the value of YouTube
     *
     * @param string $YouTube
     *
     * @return self
     */
    public function setYouTube(string $YouTube): self
    {
        $this->YouTube = $YouTube;

        return $this;
    }
         /**
     * Get the value of Spotify
     *
     * @return string
     */
    public function getSpotify(): string
    {
        return $this->Spotify;
    }

    /**
     * Set the value of Spotify
     *
     * @param string $Spotify
     *
     * @return self
     */
    public function setSpotify(string $Spotify): self
    {
        $this->Spotify = $Spotify;

        return $this;
    }
   
             /**
     * Get the value of DemoSong
     *
     * @return string
     */
    public function getDemoSong(): string
    {
        return $this->DemoSong;
    }

    /**
     * Set the value of DemoSong
     *
     * @param string $DemoSong
     *
     * @return self
     */
    public function setDemoSong(string $DemoSong): self
    {
        $this->DemoSong = $DemoSong;

        return $this;
    }
    
     /**
     * Get the value of Logo
     *
     * @return Image
     */
    public function getLogo(): Image
    {
        return $this->Logo;
    }

    /**
     * Set the value of Logo
     *
     * @param Image $Logo
     *
     * @return self
     */
    public function setLogo(Image $Logo): self
    {
        $this->Logo = $Logo;

        return $this;
    }
        
     /**
     * Get the value of Images
     *
     * @return Array
     */
    public function getImages(): Array
    {
        return $this->Images;
    }

    /**
     * Set the value of Images
     *
     * @param Array $Images
     *
     * @return self
     */
    public function setImages(Array $Images): self
    {
        $this->Images = $Images;

        return $this;
    }
}