<?php

namespace App\Controller;

use App\Entity\Contact;
use DateTime;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
     * @Route("/hello", name="hello_twig")
     */
    
    public function helloTwig()
    {
        
        return $this->render('base.html.twig',[
            "key" => "value",
            "Ynov" => "B3 info web dev",

        ]);
    }
    
    /**
     * @Route("/", name="hello")
     */
    
    
    public function helloParam(Request $request)
    {
        $param = $request->query->all();
        $param = $_GET;
        
        return $this->render('hello/param.html.twig', [
            'param' => $param
        ]);
    }
    
}