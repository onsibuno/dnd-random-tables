<?php

namespace App\Controller;

use App\Entity\RandomTables;
use App\Form\RandomTablesType;
use App\Repository\UserRepository;
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
    public function index(UserRepository $userRepository): Response
    {
        $table = new RandomTables();
        $user = $userRepository->findOneBy(['username' => $this->getUser()->getUserIdentifier()]);
        $form = $this->createForm(RandomTablesType::class, $table);
        
        if($form->isSubmitted() && $form->isValid()) {
            $table->setDungeonMaster($user);
        }

        return $this->render('new_table/index.html.twig', [
            'controller_name' => 'NewTableController',
            'form' => $form,
        ]);
    }
}
