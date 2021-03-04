<?php
class Rando
{
    private ?int $id;
    private ?string $name;
    private ?string $difficulty;
    private ?string $distance;
    private ?string $duration;
    private ?string $height_difference;


    public function __construct(int $id = null, string $name = null, string $difficulty = null, string $distance = null, string $duration = null, string $height_difference = null) {
        $this->id = $id;
        $this->name= $name;
        $this->difficulty= $difficulty;
        $this->distance= $distance;
        $this->duration = $duration;
        $this->height_difference = $height_difference;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): Rando
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    /**
     * @param string|null $difficulty
     */
    public function setDifficulty(?string $difficulty): Rando
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDistance(): ?string
    {
        return $this->distance;
    }

    /**
     * @param string|null $distance
     */
    public function setDistance(?string $distance): Rando
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDuration(): ?string
    {
        return $this->duration;
    }

    /**
     * @param string|null $duration
     */
    public function setDuration(?string $duration): Rando
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeightDifference(): ?string
    {
        return $this->height_difference;
    }

    /**
     * @param string|null $height_difference
     */
    public function setHeightDifference(?string $height_difference): Rando
    {
        $this->height_difference = $height_difference;
        return $this;
    }

}





