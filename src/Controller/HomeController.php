<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", host="admin.todo.do")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(TodoRepository $todoRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'todos' => $todoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/todo/{id}", name="show", methods={"GET"})
     */
    public function show(Todo $todo): Response
    {
        return $this->render('home/show.html.twig', [
            'todo' => $todo,
        ]);
    }
}
