<?php

namespace App\DataFixtures;

use App\Entity\RandomTables;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class GeneralTablesFixtures extends Fixture
{
    public const TABLE_REFERENCE_TAG = 'table-';

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $tablesData = [
            [
                'tablename' => '10 GP Gemstones',
                'tabletype' => 'plaintext',
                'dice' => 'd12',
                'theme' => 'grassland',
                'dungeonmaster' => null,
            ],
            [
                'tablename' => 'Playable Class',
                'tabletype' => 'plaintext',
                'dice' => 'd12',
                'theme' => 'city',
                'dungeonmaster' => null,
            ]
        ];

        foreach ($tablesData as $i => $data) { 
            $table = new RandomTables($manager);
            $table->setTablename($data['tablename']);
            $table->setTableType($data['tabletype']);
            $table->setDice($data['dice']);
            $table->setTheme($data['theme']);
            $table->setDungeonMaster($data['dungeonmaster']);
            $manager->persist($table);
            $this->addReference(self::TABLE_REFERENCE_TAG . $i, $table);
        }

        $manager->flush();
    }
    // public function getDependencies():array
    // {
    //     return [
    //         ContentFixtures::class
    //     ];
    // }
}
