<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'security_registration')]
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $encoder ): Response
    {
        $user = new User();
        $form = $this->createForm(UserRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            if(!$user->getId())
            {
                $user->setCreatedAt(new \DateTime());
            } 

            $hash = $encoder->hashPassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            $this->addFlash('message', 'Votre inscription a bien été prise en compte.');
            return $this->redirectToRoute('accueil');

        }

        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/connexion', name: 'security_login')]
    public function login()
    {
        return $this->render('security/connexion.html.twig');
    }

    #[Route('/deconnexion', name: 'security_logout')]
    public function logout()
    {
        $this->addFlash('message', 'Votre compte a été correctement déconnecté.');
        return $this->redirectToRoute('accueil');
    }
}
