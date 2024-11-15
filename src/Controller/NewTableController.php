<?php

namespace App\Controller;

use App\Entity\Content;
use App\Entity\RandomTables;
use App\Form\NewTableType;
use App\Form\RandomTablesType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewTableController extends AbstractController
{

    // public function new(Request $resquest): Response
    // {
        
    // }

    #[Route('/new/table', name: 'app_new_table')]
    public function index(UserRepository $userRepository, Request $request, EntityManagerInterface $em): Response
    {
        $table = new RandomTables();

        $user = $userRepository->findOneBy(['username' => $this->getUser()->getUserIdentifier()]);
        
        $form = $this->createForm(NewTableType::class, $table);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $table->setDungeonMaster($user);
            $em->persist($table);
            $em->flush();
            $this->addFlash('success', 'La table a bien été créée');
            // return $this->redirectToRoute('admin.recipe.index');
        }

        return $this->render('new_table/index.html.twig', [
            'controller_name' => 'NewTableController',
            'form' => $form,
        ]);
    }
}
