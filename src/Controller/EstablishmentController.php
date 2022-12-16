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
}
