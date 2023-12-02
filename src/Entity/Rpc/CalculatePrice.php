<?php

namespace App\Entity\Rpc;

use ApiPlatform\Metadata\Post;
use App\State\CalculatePriceProcessor;
use Symfony\Component\Validator\Constraints as Assert;

#[Post(uriTemplate: '/calculate-price', processor: CalculatePriceProcessor::class)]
class CalculatePrice
{
    #[Assert\NotBlank]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\Positive]
    protected int $product;

    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: '/(DE\d{9}$)|(GR\d{9}$)|(IT\d{11}$)|(FR[A-Z]{2}\d{9}$)/',
        message: 'The value {{ value }} is not a valid tax number',
    )]
    protected string $taxNumber;

    protected ?string $couponCode = null;

    public function getProduct(): int
    {
        return $this->product;
    }

    public function setProduct(int $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    public function setTaxNumber(string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    public function getCouponCode(): ?string
    {
        return $this->couponCode;
    }

    public function setCouponCode(?string $couponCode): self
    {
        $this->couponCode = $couponCode;
        return $this;
    }
}
