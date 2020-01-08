<?php


namespace App\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotBlank;
use Twig\Environment;

class FormController
{
    private $services;

    public function __construct( ContainerInterface $configurator )
    {
        $this->services = $configurator;
    }

    /**
     * @Route("/form/inscription", name = "form_affiche")
     *
     * @return Response
     */
    public function inscription()
    {
        /** @var FormFactory $formFactory */
        $formFactory = $this->services->get('form.factory');
        $builder = $formFactory->createBuilder();
        $builder->add( 'login', TextType::class, [
            'constraints' => new NotBlank()
        ]);
        $builder->add('ok', SubmitType::class);
        $form = $builder->getForm();

        /** @var Environment $twigEnv */
        $twigEnv = $this->services->get('twig');
        try {
            return new Response($twigEnv->render('form.html.twig', ['leForm' => $form->createView()]));
        } catch ( \Exception $exception ) {
            return new Response("<html>Problème de rendu </html>");
        }
    }
}