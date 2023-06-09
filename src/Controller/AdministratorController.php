<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\UserController as UserController;

class AdministratorController extends UserController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $this->findUserInfo();

        return $this->render('administrator/index.html.twig', [
            'userId' => $this->userId,
            'firstName' => $this->firstName,
            'role' => $this->role,
            'email' => $this->email,
        ]);
    }

    #[Route('/admin/users', name: 'app_admin_users')]
    public function users(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('administrator/users.html.twig',[
            'userId' => $this->userId,
            'firstName' => $this->firstName,
            'role' => $this->role,
            'email' => $this->email,
            'users' => $users,
        ]);
    }
}
