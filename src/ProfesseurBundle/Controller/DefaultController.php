<?php

namespace ProfesseurBundle\Controller;

use ProfesseurBundle\Entity\Professeur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
		$prof = new Professeur();
		$form = $this->createFormBuilder($prof)
			->add('nom','text')
			->add('prenom','text')
			->add('valider','submit')
			->getForm();
		$form->handleRequest($request);
		if ($request->getMethod() == 'POST') {
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($prof);
				$em->flush();
				$request->getSession()->getFlashBag()->add('notice', 'Professeur bien enregistrée.');
				return $this->render('ProfesseurBundle:Professeur:index.html.twig');
			}
		}
        return $this->render('ProfesseurBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
