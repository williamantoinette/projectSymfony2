<?php

namespace ProfesseurBundle\Controller;

use ProfesseurBundle\Entity\Professeur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
		/*if ($request->getMethod() == 'POST') { // Si on a soumis le formulaire
			$form->bindRequest($request); // On bind les valeurs du POST à notre formulaire
			if ($form->isValid()) { // On teste si les données entrées dans notre formulaire sont valides
			
			}
		}*/
        return $this->render('ProfesseurBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
	
	public function addAction()
	{
		/* $prof = new Professeur();
		 $form = $this->get('form.factory')->createBuilder('form', $prof)
		// $form = $this->get('form.factory')->createBuilder('form')
		  ->add('nom','text')
		  ->add('prenom','text')
		  ->add('valider','submit')
		  ->getForm();
		  
		$form->handleRequest($request);
		
		if ($form->isValid()) {
		  $em = $this->getDoctrine()->getManager();
		  $em->persist($prof);
		  $em->flush();
		  $request->getSession()->getFlashBag()->add('notice', 'Professeur bien enregistrée.');
		  return $this->render('ProfesseurBundle:Professeur:index.html.twig');
		  // return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $prof->getId())));
		}
		return $this->render('ProfesseurBundle:Professeur:index.html.twig', array('form' => $form->createView(),));
		//return $this->render('ProfesseurBundle:Default:index.html.twig');
		*/
	}
}
