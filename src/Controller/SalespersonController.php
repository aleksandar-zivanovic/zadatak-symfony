<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\UserController as UserController;

class SalespersonController extends UserController
{
    #[Route('/salesperson', name: 'app_salesperson')]
    public function index(): Response
    {
        $this->findUserInfo();

        return $this->render('salesperson/index.html.twig', [
            'userId' => $this->userId,
            'firstName' => $this->firstName,
            'role' => $this->role,
            'email' => $this->email,
        ]);
    }

    #[Route('/salesperson/sales', name: 'app_salesperson_sales')]
    public function sales(): Response
    {
        $this->findUserInfo();

        return $this->render('salesperson/sales.html.twig', [
            'userId' => $this->userId,
            'firstName' => $this->firstName,
            'role' => $this->role,
            'email' => $this->email,
        ]);
    }
}
