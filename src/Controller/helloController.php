<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class helloController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request){

        $contact= new Contact();

        
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $manager = $this->getDoctrine()->getManager();
            $contact->setDate(new DateTimeImmutable());
            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('contact');
        }
        return $this->render('hello/conctact.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
    /**
     * @Route("/categories", name="categories")
     */
    
    public function helloTwig()
    {
        return $this->render('hello/categories.html.twig');
    }
    
    /**
     * @Route("/", name="hello")
     */
    
    public function helloParam(Request $request)
    {        
        return $this->render('base.html.twig');
    }
    
}