<?php

namespace App\Controller;

use App\Entity\RandomTables;
use App\Form\RandomTables1Type;
use App\Repository\RandomTablesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/random/tables')]
final class RandomTablesController extends AbstractController{
    #[Route(name: 'app_random_tables_index', methods: ['GET'])]
    public function index(RandomTablesRepository $randomTablesRepository): Response
    {
        return $this->render('random_tables/index.html.twig', [
            'random_tables' => $randomTablesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_random_tables_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $randomTable = new RandomTables();
        $form = $this->createForm(RandomTables1Type::class, $randomTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($randomTable);
            $entityManager->flush();

            return $this->redirectToRoute('app_random_tables_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('random_tables/new.html.twig', [
            'random_table' => $randomTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_random_tables_show', methods: ['GET'])]
    public function show(RandomTables $randomTable): Response
    {
        return $this->render('random_tables/show.html.twig', [
            'random_table' => $randomTable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_random_tables_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RandomTables $randomTable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RandomTables1Type::class, $randomTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_random_tables_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('random_tables/edit.html.twig', [
            'random_table' => $randomTable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_random_tables_delete', methods: ['POST'])]
    public function delete(Request $request, RandomTables $randomTable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$randomTable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($randomTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_random_tables_index', [], Response::HTTP_SEE_OTHER);
    }
}
