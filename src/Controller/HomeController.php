<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $firstName = $role = '';
        if($this->getUser() != null) {
            $user = $this->getUser();
            $firstName = $user->getFirstName();

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

        return $this->render('home/index.html.twig', [
            'firstName' => $firstName,
            'role' => $role,
        ]);
    }
}
