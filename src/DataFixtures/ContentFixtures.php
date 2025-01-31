<?php

namespace App\DataFixtures;

use App\Entity\Table;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ContentFixtures extends Fixture implements DependentFixtureInterface
{
    public const CONTENT_REFERENCE_TAG = 'content-';

    public function getDependencies():array
    {
        return [
            GeneralTablesFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $tablesData = array(
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Azurite (opaque mottled deep blue)',
                'nombre' => 6,
                'table' => 0,
            ),
            array(
                'case' => 2,
                'categorie' => 'plaintext',
                'choix' => 'Banded agate (translucent striped brown, blue, white, or red)',
                'nombre' => 6,
                'table' => 0,                
            ),
            array(
                'case' => 3,
                'categorie' => 'plaintext',
                'choix' => 'Blue quartz (transparent pale blue)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 4,
                'categorie' => 'plaintext',
                'choix' => 'Eye agate (translucent circles of gray, white, brown , blue , or green)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 5,
                'categorie' => 'plaintext',
                'choix' => 'Hematite (opaque gray-black)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 6,
                'categorie' => 'plaintext',
                'choix' => 'Lapis lazuli (opaque light and dark blue with yellow flecks)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 7,
                'categorie' => 'plaintext',
                'choix' => 'Malachite (opaque striated light and dark green)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 8,
                'categorie' => 'plaintext',
                'choix' => 'Moss agate (translucent pink or yellow-white with mossy gray or green markings)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 9,
                'categorie' => 'plaintext',
                'choix' => 'Obsidian (opaque black)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 10,
                'categorie' => 'plaintext',
                'choix' => 'Rhodochrosite (opaque light pink)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 11,
                'categorie' => 'plaintext',
                'choix' => 'Tiger eye (translucent brown with golden center)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 12,
                'categorie' => 'plaintext',
                'choix' => 'Turquoise (opaque light blue-green)',
                'nombre' => 6,
                'table' => 0, 
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Barbare',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Barde',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Clerc',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Druide',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Ensorceleur',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Guerrier',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Magicien',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Moine',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Occultiste',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Paladin',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Rôdeur',
                'nombre' => null,
                'table' => 1,
            ),
            array(
                'case' => 1,
                'categorie' => 'plaintext',
                'choix' => 'Roublard',
                'nombre' => null,
                'table' => 1,
            ),
        );

        foreach ($tablesData as $i => $data) {
            $table = new Table();
            $table->setLine($data['case']);
            $table->setCategory($data['categorie']);
            $table->setChoice($data['choix']);
            $table->setAmount($data['nombre']);
            $table->setRandomTable($this->getReference(GeneralTablesFixtures::TABLE_REFERENCE_TAG . $data['table']));
            $manager->persist($table);
            $this->addReference(self::CONTENT_REFERENCE_TAG . $i, $table);
        }


        $manager->flush();
    }
}
