<?php

namespace App\Controller;

use App\Entity\RandomTables;

use App\Repository\RandomTablesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class dndTablesController extends AbstractController
{

    #[Route('/tables', name: 'app_dnd_tables')]
    public function index(RandomTablesRepository $randomTablesRepository): Response
    {
        $numeroPage = rand(1, 3);
        $lienPage = 'images/pages' . $numeroPage . '.png';
        
        return $this->render('dnd_tables/index.html.twig', [
            'controller_name' => 'DndTablesController',
            'lienPage' => $lienPage,
            'random_tables' => $randomTablesRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_dnd_table', methods: ['GET'])]
    public function show(RandomTablesRepository $randomTablesRepository, Request $request): Response
    {  
        $numeroPage = rand(1, 3);
        $lienPage = 'images/pages' . $numeroPage . '.png';
        $table_id = $request->get('id');
        $response = $randomTablesRepository->findOneBy(['id' => $table_id]);

        return $this->render('dnd_tables/show.html.twig', [
            'controller_name' => 'DndTablesController',
            'lienPage' => $lienPage,
            'random_tables' => $randomTablesRepository->findAll(),
            'chosen_table' => $randomTablesRepository->findOneBy(['id' => $table_id]),
            'table_content' => $response,
        ]);
    }
}
