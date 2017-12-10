<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
        ]);
    }


    public function resumeAction()
    {

        return $this->render('default/resume.html.twig', [
        ]);
    }

    public function projectAction()
    {

        return $this->render('default/project.html.twig', [
        ]);
    }

    public function hobbiesAction()
    {

        return $this->render('default/hobbies.html.twig', [
        ]);
    }

    public function contactAction(Request $request)
    {

        $contact = new Contact();

        $form   = $this->get('form.factory')->create(ContactType::class, $contact);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->render('default/contact.html.twig', array('form' => $form->createView(), 'toast' => true));
        }

        return $this->render('default/contact.html.twig', array('form' => $form->createView(), 'toast' => false));
    }
}
