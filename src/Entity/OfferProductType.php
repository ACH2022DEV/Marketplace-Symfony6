<?php

namespace App\Entity;

use App\Repository\OfferProductTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


<<<<<<< HEAD
#[ORM\Entity(repositoryClass: OfferProductTypeRepository::class)]
=======
 #[ORM\Entity(repositoryClass: OfferProductTypeRepository::class)]
>>>>>>> origin/main

class OfferProductType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['SellerOffers'])]
    private ?int $id = null;

    #[ORM\ManyToOne( inversedBy: 'offerProductTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offer $offer = null;

    #[ORM\ManyToOne(cascade: ['persist','remove'], inversedBy: 'offerProductTypes')]
    #[ORM\JoinColumn( nullable: true)]
    #[Assert\NotBlank(message: 'This value should not be blank')]
    #[Groups(['SellerOffers'])]

    private ?ProductType $productType = null;

    #[ORM\Column(length: 45)]
    #[Groups(['SellerOffers'])]
    private ?string $maxItems = null;

    #[ORM\Column]
    #[Groups(['SellerOffers'])]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    public function setOffer(?Offer $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

<<<<<<< HEAD
    /*  public function getProductTypeidProductType(): ?ProductType
      {
          return $this->productType;
      }

      public function setProductTypeidProductType(?ProductType $productType): self
      {
          $this->productType = $productType;

          return $this;
      }*/


    public function getProductType(): ?ProductType
=======
  /*  public function getProductTypeidProductType(): ?ProductType
>>>>>>> origin/main
    {
        return $this->productType;
    }

<<<<<<< HEAD
    public function setProductType( ?ProductType $productType): self
=======
    public function setProductTypeidProductType(?ProductType $productType): self
>>>>>>> origin/main
    {
        $this->productType = $productType;

        return $this;
<<<<<<< HEAD
    }


    public function getMaxItems(): ?string
=======
    }*/


     public function getProductType(): ?ProductType
     {
         return $this->productType;
     }

     public function setProductType( ?ProductType $productType): self
     {
         $this->productType = $productType;

         return $this;
     }


     public function getMaxItems(): ?string
>>>>>>> origin/main
    {
        return $this->maxItems;
    }

    public function setMaxItems(string $maxItems): self
    {
        $this->maxItems = $maxItems;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
<<<<<<< HEAD
    public function __toString(): string
    {
        $m = "*".'product type: '. $this->getProductType()->getName()."\n".
            'max items: '.$this->getMaxItems()."\r\n".
            'price'.$this->getPrice()."\r\n";

        return $m;
        // TODO: Implement __toString() method.
    }
=======
     public function __toString(): string
     {
         $m = "*".'product type: '. $this->getProductType()->getName()."\n".
             'max items: '.$this->getMaxItems()."\r\n".
             'price'.$this->getPrice()."\r\n";

         return $m;
         // TODO: Implement __toString() method.
     }
>>>>>>> origin/main
}
