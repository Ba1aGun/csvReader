<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TblProductDataRepository")
 */
class TblProductData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $intProductDataId;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $strProductName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $strProductDesc;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $strProductCode;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dtmAdded;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dtmDiscontinued;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
     */
    private $stmTimestamp;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $intStockLevel;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    private $decPrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntProductDataId(): ?int
    {
        return $this->intProductDataId;
    }

    public function setIntProductDataId(?int $intProductDataId): self
    {
        $this->intProductDataId = $intProductDataId;

        return $this;
    }

    public function getStrProductName(): ?string
    {
        return $this->strProductName;
    }

    public function setStrProductName(?string $strProductName): self
    {
        $this->strProductName = $strProductName;

        return $this;
    }

    public function getStrProductDesc(): ?string
    {
        return $this->strProductDesc;
    }

    public function setStrProductDesc(?string $strProductDesc): self
    {
        $this->strProductDesc = $strProductDesc;

        return $this;
    }

    public function getStrProductCode(): ?string
    {
        return $this->strProductCode;
    }

    public function setStrProductCode(?string $strProductCode): self
    {
        $this->strProductCode = $strProductCode;

        return $this;
    }

    public function getDtmAdded(): ?\DateTimeInterface
    {
        return $this->dtmAdded;
    }

    public function setDtmAdded(?\DateTimeInterface $dtmAdded): self
    {
        $this->dtmAdded = $dtmAdded;

        return $this;
    }

    public function getDtmDiscontinued(): ?\DateTimeInterface
    {
        return $this->dtmDiscontinued;
    }

    public function setDtmDiscontinued(?\DateTimeInterface $dtmDiscontinued): self
    {
        $this->dtmDiscontinued = $dtmDiscontinued;

        return $this;
    }

    public function getStmTimestamp(): ?\DateTimeInterface
    {
        return $this->stmTimestamp;
    }

    public function setStmTimestamp(?\DateTimeInterface $stmTimestamp): self
    {
        $this->stmTimestamp = $stmTimestamp;

        return $this;
    }

    public function getIntStockLevel(): ?int
    {
        return $this->intStockLevel;
    }

    public function setIntStockLevel(?int $intStockLevel): self
    {
        $this->intStockLevel = $intStockLevel;

        return $this;
    }

    public function getDecPrice(): ?string
    {
        return $this->decPrice;
    }

    public function setDecPrice(?string $decPrice): self
    {
        $this->decPrice = $decPrice;

        return $this;
    }
}
