<?php

namespace App\Controller;

use App\Entity\Establishment;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstablishmentController extends AbstractController
{
    #[Route('/', name: 'app_establishment')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $establishmentList = $doctrine->getRepository(Establishment::class)->findAll();

        return $this->render('establishment/index.html.twig', [
            'establishments' => $establishmentList,
        ]);
    }

    #[Route('/ehpad', name:'app_establishment_ehpad')]
    public function ehpadList(ManagerRegistry $doctrine): Response 
    {
        $ehpadList = $doctrine->getRepository(Establishment::class)->findBy(['type' => 'EHPAD']);

        return $this->render('establishment/ehpadList.html.twig', [
            'establishments' => $ehpadList,
        ]);
    }

    #[Route('/rss', name:'app_establishment_rss')]
    public function rssList(ManagerRegistry $doctrine): Response
    {
        $rssList = $doctrine->getRepository(Establishment::class)->findBy(['type' => 'Résidence Services Seniors']);

        return $this->render('establishment/rssList.html.twig', [
            'establishments' => $rssList,
        ]);
    }

    #[Route('/etablissement/{id}', name: 'app_establishment_show')]
    public function establishmentShow(ManagerRegistry $doctrine, int $id): Response
    {
        $establishment = $doctrine->getRepository(Establishment::class)->find($id);
        
        return $this->render('establishment/show.html.twig', [
            'establishment' => $establishment,
        ]);
    }
}
