<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\UserController as UserController;

class ClientController extends UserController
{
    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $this->findUserInfo();

        return $this->render('client/index.html.twig', [
            'userId' => $this->userId,
            'firstName' => $this->firstName,
            'role' => $this->role,
            'email' => $this->email,
        ]);
    }
}
