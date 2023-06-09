<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public string $firstName = '';
    public string $role = '';
    public string $email = '';
    public int|string $userId = '';

    public function findUserInfo(): void
    {
        $this->firstName = $this->role = '';
        if($this->getUser() != null) {
            $user = $this->getUser();
            $this->userId = $user->getId();
            $this->firstName = $user->getFirstName();
            $this->email = $user->getUserIdentifier();

            if(in_array('ROLE_USER', $user->getRoles())) {
                if(in_array('ROLE_ADMIN', $user->getRoles())) {
                    $this->role = 'ADMIN';
                } elseif(!in_array('ROLE_ADMIN', $user->getRoles()) && in_array('ROLE_SALESPERSON', $user->getRoles())) {
                    $this->role = 'SALESPERSON';
                } else {
                    $this->role = 'CLIENT';
                }
            }
        }
    }
//    #[Route('/user', name: 'app_user')]
//    public function index(): Response
//    {
//        return $this->render('user/index.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
//    }
}
