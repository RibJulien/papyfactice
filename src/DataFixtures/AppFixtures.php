<?php

namespace App\DataFixtures;

use App\Entity\Establishment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        

        // Tableau de tous les établissements
        $establishmentList = [
            1 => [
                'name' => 'Les Amandiers',
                'type' => 'EHPAD',
                'address' => '2 Rue de Four',
                'zip' => '89000',
                'city' => 'Auxerre',
                'email' => 'contact@les-amandiers.fr'
            ],
            2 => [
                'name' => 'Magenta',
                'type' => 'EHPAD',
                'address' => '6 Avenue Delecourt',
                'zip' => '89000',
                'city' => 'Auxerre',
                'email' => 'contact@ehpad-magenta.fr'
            ],
            3 => [
                'name' => 'La Maison des Parents',
                'type' => 'Résidence Services Seniors',
                'address' => '18 Rue du Château',
                'zip' => '89000',
                'city' => 'Auxerre',
                'email' => 'contact@lmdp.fr'
            ],
            4 => [
                'name' => 'Résidence Océane',
                'type' => 'EHPAD',
                'address' => '11 rue Simone Veil',
                'zip' => '89000',
                'city' => 'Auxerre',
                'email' => 'contact@residence-oceane.fr'
            ],
            5 => [
                'name' => 'Cap Retraite',
                'type' => 'EHPAD',
                'address' => '91 Rue du Faubourg Saint-Honoré',
                'zip' => '89000',
                'city' => 'Auxerre',
                'email' => 'cap@retraite.fr'
            ],
            6 => [
                'name' => 'Le Trèfle Bleu',
                'type' => 'Résidence Services Seniors',
                'address' => '78 Avenue du pont Paul Bert',
                'zip' => '89000',
                'city' => 'Auxerre',
                'email' => 'contact@trefle-bleu.fr'
            ],
            7 => [
                'name' => 'Les Jardins Mirabeau',
                'type' => 'Résidence Services Seniors',
                'address' => '41 Rue Balard',
                'zip' => '89300',
                'city' => 'Joigny',
                'email' => 'contact@jardins-mirabeau.fr'
            ],
            8 => [
                'name' => 'Senioreo',
                'type' => 'Résidence Services Seniors',
                'address' => '14 Rue Gustave Charpentier',
                'zip' => '89300',
                'city' => 'Joigny',
                'email' => 'joigny@senioreo.fr'
            ],
            9 => [
                'name' => 'Hespérides Vaugirard',
                'type' => 'Résidence Services Seniors',
                'address' => '23 Rue de Vaugirard',
                'zip' => '89300',
                'city' => 'Joigny',
                'email' => 'contact@residence-hesperides.fr'
            ],            
            10 => [
                'name' => 'Mozart',
                'type' => 'EHPAD',
                'address' => '27 rue Mozart',
                'zip' => '89300',
                'city' => 'Joigny',
                'email' => 'ehpad@mozart-joigny.fr'
            ],     
        ];

        // Création des 10 établissements en bouclant sur le tableau $establishmentList
        foreach ($establishmentList as $key => $value) {
            $establishment = new Establishment;
            $establishment->setName($value['name'])
                        ->setType($value['type'])
                        ->setAddress($value['address'])
                        ->setZip($value['zip'])
                        ->setCity($value['city'])
                        ->setEmail($value['email']);
            $manager->persist($establishment);
        }

        // On envoi en DB tout ce qui était persisté
        $manager->flush();
    }

    
}
