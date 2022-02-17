<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TodoListService\TodoListService;


class ToDoPlanningController extends AbstractController
{

    /**
     * @Route("/", name="toDoPlanning")
     */
    public function index(TodoListService $todoListService): Response
    {
        try {
            //You Can Check Provider
            $todoData = $todoListService->setProvider("providerEn");
            return $this->render('toDoPlanning/index.html.twig', [
                'todoList' => $todoData
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(array('error' => $e->getMessage()));
        }

    }
}


