<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ActividadPersona;
use AppBundle\Form\ActividadPersonaType;

class ActividadPersonaController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actividadPersonas = $em->getRepository('AppBundle:ActividadPersona')->findAll();

        return $this->render('actividadpersona/index.html.twig', array(
            'actividadPersonas' => $actividadPersonas,
        ));
    }

  
     public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $actividadPersonas = $em->getRepository('AppBundle:ActividadPersona')->findAll();
                                                
        return $this->render('actividadpersona/login.html.twig', array(
            'actividadPersonas' => $actividadPersonas,
        ));
    }
    
    
    public function newAction(Request $request)
    {
        $actividadPersona = new ActividadPersona();
        $form = $this->createForm(ActividadPersonaType::class, $actividadPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actividadPersona);
            $em->flush();

            return $this->redirectToRoute('actividadpersona_show', array('id' => $actividadPersona->getIdActPer()));
        }

        return $this->render('actividadpersona/new.html.twig', array(
            'actividadPersona' => $actividadPersona,
            'form' => $form->createView(),
        ));
    }

   
    public function showAction(ActividadPersona $actividadPersona)
    {
        return $this->render('actividadpersona/show.html.twig', array(
            'actividadPersona' => $actividadPersona,
        ));
    }

     public function editAction(Request $request, ActividadPersona $actividadPersona)
    {
        $editForm = $this->createForm(ActividadPersonaType::class, $actividadPersona);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actividadPersona);
            $em->flush();

            return $this->redirectToRoute('actividadpersona_edit', array('id' => $actividadPersona->getIdActPer()));
        }

        return $this->render('actividadpersona/edit.html.twig', array(
            'actividadPersona' => $actividadPersona,
            'edit_form' => $editForm->createView(),
        ));
    }

     public function deleteAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $avi_repo = $em->getRepository("AppBundle:ActividadPersona");
        $avi = $avi_repo->find($id);
        
        $em->remove($avi);
        $em->flush();
        
        return $this->redirectToRoute('actividadpersona_index');        
    }
}
