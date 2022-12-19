<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Form\ContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
    public function establishmentShow(ManagerRegistry $doctrine, int $id, Request $request, MailerInterface $mailer): Response
    {
        $establishment = $doctrine->getRepository(Establishment::class)->find($id);

        /* Creation du formulaire */
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        /* Récupération des données et envoi du mail si le formulaire est envoyé */
        if($form->isSubmitted() && $form->isValid()) {
            $resultForm = ($form->getData());
            $email = (new Email())
                ->from($resultForm['email'])
                ->to($establishment->getEmail())
                ->subject('Vous avez recu un message via votre formulaire de contact')
                ->html('<p>Vous avez recu un mail via le formulaire de contact de votre établissement "'.$establishment->getName().'" sur PapyFactice</p>
                            <p>'.$resultForm['firstname'].' '.$resultForm['name']. 'vous a envoyé ce message :</p><p>'.$resultForm['message'].'
                            </p><p>Voici son email pour lui répondre: '.$resultForm['email'].'</p>');
                            

            $mailer->send($email);
        }
        
        
        return $this->render('establishment/show.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }
}
