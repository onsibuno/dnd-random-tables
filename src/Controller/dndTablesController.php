<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class dndTablesController extends AbstractController
{
    #[Route('/tables', name: 'app_dnd_tables')]
    public function index(): Response
    {

        $inclinaison = rand(-0.002, 0.002);
        $numeroPage = rand(1, 3);
        $lienPage = 'images/pages' . $numeroPage . '.png';
        
        return $this->render('dnd_tables/index.html.twig', [
            'controller_name' => 'DndTablesController',
            // 'lienBackgroundPage' => $lienPage,
            // 'styleTilt' => $inclinaison,
            'lienPage' => $lienPage,
            'inclinaison' => $inclinaison
        ]);
    }
}
