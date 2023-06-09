<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministratorController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $firstName = $role = '';
        if($this->getUser() != null) {
            $user = $this->getUser();
            $userId = $user->getId();
            $firstName = $user->getFirstName();
            $email = $user->getUserIdentifier();

            if(in_array('ROLE_USER', $user->getRoles())) {
                if(in_array('ROLE_ADMIN', $user->getRoles())) {
                    $role = 'ADMIN';
                } elseif(!in_array('ROLE_ADMIN', $user->getRoles()) && in_array('ROLE_SALESPERSON', $user->getRoles())) {
                    $role = 'SALESPERSON';
                } else {
                    $role = 'CLIENT';
                }
            }
        }

        if($role === 'ADMIN') {
            return $this->render('administrator/index.html.twig', [
                'userId' => $userId,
                'firstName' => $firstName,
                'role' => $role,
                'email' => $email,
            ]);
        } else {
            return $this->render('home/index.html.twig', [
                'firstName' => $firstName,
                'role' => $role,
            ]);
        }

    }
}
