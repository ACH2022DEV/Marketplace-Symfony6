<?php

namespace App\Controller\Shared;

use App\Entity\Offer;
use App\Entity\Seller;
use App\Entity\SellerOffer;
use App\Form\OfferType;
<<<<<<< HEAD
use App\Repository\OfferProductTypeRepository;
use App\Repository\OfferRepository;
use App\Repository\ProductTypeRepository;
use App\Repository\SellerOfferRepository;
=======
use App\Repository\OfferRepository;
>>>>>>> origin/main
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;


#[Route('/offer')]
class OfferController extends AbstractController
{
    private $manager;
    private $offer;
    private $em;
    #[Route('/', name: 'app_offer_index', methods: ['GET'])]
    public function index(OfferRepository $offerRepository): Response
    {
        return $this->render('offer/index.html.twig', [
            'offers' => $offerRepository->findAll(),
        ]);
    }
    //add an offer controller
    #[Route('/getAllOffers', name: 'app_offer_seller', methods: ['GET'])]
<<<<<<< HEAD
    public function getOffer(OfferRepository $offerRepository, ProductTypeRepository $productTypeRepository): Response
    {
        $offers = $offerRepository->findAll();
        $productTypes = $productTypeRepository->findAll();

        return $this->render('seller/dashboard/offerList.html.twig', [
            'offer' => $offers,
            'productType' => $productTypes,
        ]);
    }

    #[Route('/offer/getAllOffersHotels', name: 'app_offer_seller_Hotels', methods: ['GET'])]
    public function getOfferHotels(OfferRepository $offerRepository, ProductTypeRepository $productTypeRepository ): Response
    {
//        if (!$authChecker->isGranted('ROLE_SELLER')) {
//            return $this->redirectToRoute('app_login_seller');
//        }
        return $this->render('seller/dashboard/Hotel.html.twig', [
            'offer' => $offerRepository->findAll(),
            'productType'=> $productTypeRepository->findAll()
=======
    public function getOffer(OfferRepository $offerRepository): Response
    {
        return $this->render('seller/dashboard/offerList.html.twig', [
            'offer' => $offerRepository->findAll(),
>>>>>>> origin/main
        ]);
    }
    //add home Page
    #[Route('/Home', name: 'app_Home_seller', methods: ['GET'])]
<<<<<<< HEAD
    public function getPageHome(OfferProductTypeRepository $offerProductTypeRepository, SellerOfferRepository $sellerOfferRepository ): Response
    {

        $offers = $this->em->getRepository(Offer::class)->findBy([], ['id' => 'DESC'], 3);
        $sellers = $sellerOfferRepository->findAll();
        return $this->render('seller/dashboard/home_seller.html.twig', [
            'offers' => $offers,
            'offerProdType' => $offerProductTypeRepository->findAll(),
            'seller_offers' => $sellers,
=======
    public function getPageHome(): Response
    {
        return $this->render('seller/dashboard/home_seller.html.twig', [
>>>>>>> origin/main
            //'offer' => $offerRepository->findAll(),
        ]);
    }

    //end home page
    #[Route('/GetAllOfferse', name: 'offer_list', methods: ['GET'])]
    public function getAllOffres(SerializerInterface $serializer): Response
    {
        $List_offer=$this->offer->findAll();
        $serializedOffers = $serializer->serialize($List_offer, 'json', ['groups' => 'offer']);
        $data = json_decode($serializedOffers, true);
<<<<<<< HEAD
        /*    foreach ($data as $item) {
                echo "Offer Product Types: " . json_encode($item['offerProductTypes']) . PHP_EOL;
                echo "Seller Offers: " . json_encode($item['sellerOffers']) . PHP_EOL;
            }*/
=======
    /*    foreach ($data as $item) {
            echo "Offer Product Types: " . json_encode($item['offerProductTypes']) . PHP_EOL;
            echo "Seller Offers: " . json_encode($item['sellerOffers']) . PHP_EOL;
        }*/
>>>>>>> origin/main
        return $this->json($data,200);
    }
    #[Route('/new', name: 'app_offer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OfferRepository $offerRepository): Response
    {
        $offer = new Offer();
<<<<<<< HEAD
        /* $offerproduct=new OfferProductType();
         $offerproduct->setMaxItems(25);
         $offerproduct->setPrice(255);

         $offer->addOfferProductType($offerproduct);*/
=======
       /* $offerproduct=new OfferProductType();
        $offerproduct->setMaxItems(25);
        $offerproduct->setPrice(255);

        $offer->addOfferProductType($offerproduct);*/
>>>>>>> origin/main
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offerRepository->save($offer, true);

            return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offer/new.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offer_show', methods: ['GET'])]
    public function show(Offer $offer): Response
    {
        return $this->render('offer/show.html.twig', [
            'offer' => $offer,
        ]);
    }
    //add a controller
    #[Route('/{id}/offers', name: 'app_Show_offer_For_seller', methods: ['GET'])]
    public function showOffer(Offer $offer): Response
    {
<<<<<<< HEAD
        $pricesByOffer = [];

        $offers = [$offer]; // Créez un tableau contenant l'offre individuelle passée en paramètre

        foreach ($offers as $o) { // Utilisez une variable différente pour la boucle
            $pricesByOffer[$o->getId()] = $o->calculateTotalPrice();
        }
        return $this->render('seller/dashboard/offerList.html.twig', [
            'offer' => $offer,
            'pricesByOffer' => $pricesByOffer,
=======
        return $this->render('offer/show.html.twig', [
            'offer' => $offer,
>>>>>>> origin/main
        ]);
    }



<<<<<<< HEAD
=======

>>>>>>> origin/main
    #[Route('/{id}/edit', name: 'app_offer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offer $offer, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(OfferType::class, $offer);

        // Store original offerProductTypes for removal check
        $originalOfferProductTypes = new ArrayCollection();
        foreach ($offer->getOfferProductTypes() as $offerProductTypes) {
            $originalOfferProductTypes->add($offerProductTypes);
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Remove offerProductTypes that were removed from the form
            foreach ($originalOfferProductTypes as $offerProductTypes) {
                if (false === $offer->getOfferProductTypes()->contains($offerProductTypes)) {
                    // Check if offer product type has any associated child records
                    if ($offerProductTypes->getProductType()) {
                        // Remove the association with the child record first to avoid foreign key constraint errors
                        $offerProductTypes->getProductType()->removeOfferProductType($offerProductTypes);
                    }
                    $manager->remove($offerProductTypes);
                }
            }

            // Add new offerProductTypes
            foreach ($form->get('offerProductTypes')->getData() as $offerProductTypes) {
                $offerProductTypes->setOffer($offer);
                $manager->persist($offerProductTypes);
            }

            $manager->flush();

            return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offer/edit.html.twig', [
            'offer' => $offer,
            'form' => $form,
        ]);
    }



    #[Route('/{id}', name: 'app_offer_delete', methods: ['POST'])]
    public function delete(Request $request, Offer $offer, OfferRepository $offerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offer->getId(), $request->request->get('_token'))) {
            $offerRepository->remove($offer, true);
        }

        return $this->redirectToRoute('app_offer_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/{id}/OfferProductsTypes', name: 'app_offerProductTypes', methods: ['GET'])]
    public function showOfferProductTypes(int $id): Response
    {

        $offer =  $this->doctrine
            ->getRepository(Offer::class)
            ->find($id);
<<<<<<< HEAD
        // $offerProductTypes = $offer->getOfferProductTypes();
=======
       // $offerProductTypes = $offer->getOfferProductTypes();
>>>>>>> origin/main

        if (!$offer) {
            throw $this->createNotFoundException(
                'No offer found for id '.$id
            );
        }

        return $this->render('offer/show_Offer_Product.html.twig', [
            'offer' => $offer,
<<<<<<< HEAD
            // 'offerProductTypes' => $offerProductTypes
=======
           // 'offerProductTypes' => $offerProductTypes
>>>>>>> origin/main

        ]);
    }
//add a controller

    #[Route('/{id}/OfferProductsTypesForSeller', name: 'app_offerProductTypes_ForSeller', methods: ['GET'])]
    public function showOfferProductTypesForSeller(int $id): Response
    {

        $offer =  $this->doctrine
            ->getRepository(Offer::class)
            ->find($id);
        // $offerProductTypes = $offer->getOfferProductTypes();

        if (!$offer) {
            throw $this->createNotFoundException(
                'No offer found for id '.$id
            );
        }

        return $this->render('seller/dashboard/offer_product.html.twig', [
            'offer' => $offer,
            // 'offerProductTypes' => $offerProductTypes

        ]);
    }
<<<<<<< HEAD
    #[Route('/offer/{id}/OfferProductsTypesForSeller', name: 'app_offerProductTypes_offer', methods: ['GET'])]
    public function OfferProductTypesForOffer(int $id
        // ,AuthorizationCheckerInterface $authChecker
    ): Response
    {
        /*if (!$authChecker->isGranted('ROLE_SELLER')) {
            return $this->redirectToRoute('app_login_seller');
        }*/
        $offer =  $this->doctrine
            ->getRepository(Offer::class)
            ->find($id);
        // $offerProductTypes = $offer->getOfferProductTypes();

        if (!$offer) {
            throw $this->createNotFoundException(
                'No offer found for id '.$id
            );
        }

        return $this->render('seller/dashboard/offerList.html.twig', [
            'offer' => $offer,
            // 'offerProductTypes' => $offerProductTypes

        ]);
    }
=======
>>>>>>> origin/main

//
    public function __construct(private Security $security,private ManagerRegistry $doctrine,EntityManagerInterface $manager, OfferRepository $offer) {
        $this->em=$doctrine;
        $this->offer=$offer;
        $this->manager=$manager;
    }





}
