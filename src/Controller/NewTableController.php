<?php

namespace App\Controller;

use App\Entity\Content;
use App\Entity\RandomTables;
use App\Form\NewTableType;
use App\Form\RandomTablesType;
use App\Repository\RandomTablesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewTableController extends AbstractController
{

    // public function new(Request $resquest): Response
    // {
        
    // }

    #[Route('/new/table', name: 'app_new_table')]
    public function index(UserRepository $userRepository, Request $request, EntityManagerInterface $em, RandomTablesRepository $randomTablesRepository): Response
    {
        $table = new RandomTables($em);

        $user = $userRepository->findOneBy(['username' => $this->getUser()->getUserIdentifier()]);
        
        $form = $this->createForm(NewTableType::class, $table);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $table->setDungeonMaster($user);
            $em->persist($table);
            $em->flush();
            $this->addFlash('success', 'La table a bien été créée');
            return $this->redirectToRoute('app_random_tables_edit', array('id' => $randomTablesRepository->findLastBy($user)->getId()) );
        }

        return $this->render('new_table/index.html.twig', [
            'controller_name' => 'NewTableController',
            'form' => $form,
        ]);
    }
}
