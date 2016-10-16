<?php

namespace TareasSymfony\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TareasSymfony\UserBundle\Entity\User;
use TareasSymfony\UserBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('TareasSymfonyUserBundle:User')->findAll();

        /*
        $res = "Lista de users <br>";

        foreach ($users as $user) {
         	$res .= "User: lastname:".$user->getId()." - Firstname: ".$user->getFirstname();
         } 

        return new Response($res);
        */

        return $this->render('TareasSymfonyUserBundle:User:index.html.twig', array('users' => $users));
    }

    public function viewAction($id)
    {
    	$repository = $this->getDoctrine()->getRepository('TareasSymfonyUserBundle:User');

    	$user = $repository->find($id);


    	return new Response('useremail: '.$user->getEmail() );
    }



    private function createCreateForm(User $entity)
    {
    	$form = $this->createForm(new UserType(), $entity, array(
    		'action' => $this->generateUrl('tareas_symfony_user_create'),
    		'method' => 'POST'
    		) );
    	return $form;
    }


    public function addAction()
    {
    	$user = new User;

    	$form = $this->createCreateForm($user);

    	return new Response('TareasSymfonyUserBundle:User:add.html.twig', array('form' => $form) );

    }

    

}
