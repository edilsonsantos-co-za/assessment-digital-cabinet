<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TortoiseController extends AbstractController
{
    /**
     * @Route("/", name="tortoise_directions")
     */
    public function index(Request $request): Response
    {
        $formData = [];
        $form = $this->createFormBuilder($formData)
            ->add('directions', TextType::class, [
                'label' => 'Enter Directions (F, R, L):',
                'attr' => ['class' => 'form-control', 'required' => true]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Submit',
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $directions = $formData['directions'];

            // Call your JavaScript function to calculate and visualize
            // You can pass $directions to JavaScript through data attributes or AJAX

            // Example: $this->addFlash('success', 'Form submitted successfully!');
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
