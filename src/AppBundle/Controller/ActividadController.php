<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Actividad;
use AppBundle\Form\ActividadType;

class ActividadController extends Controller
{ 
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actividads = $em->getRepository('AppBundle:Actividad')->findAll();

        return $this->render('actividad/index.html.twig', array(
            'actividads' => $actividads,
        ));
    }

    public function newAction(Request $request)
    {
        $actividad = new Actividad();
        $form = $this->createForm(ActividadType::class, $actividad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

			$em->persist($actividad);
            $em->flush();

            return $this->redirectToRoute('actividad_show', array('id' => $actividad->getIdActividad()));
        }

        return $this->render('actividad/new.html.twig', array(
            'actividad' => $actividad,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Actividad $actividad)
    {
        return $this->render('actividad/show.html.twig', array(
            'actividad' => $actividad,
        ));
    }

    public function editAction(Request $request, Actividad $actividad)
    {
        $editForm = $this->createForm(ActividadType::class, $actividad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actividad);
            $em->flush();

            return $this->redirectToRoute('actividad_edit', array('id' => $actividad->getIdActividad()));
        }

        return $this->render('actividad/edit.html.twig', array(
            'actividad' => $actividad,
            'edit_form' => $editForm->createView(),
        ));
    }

 public function deleteAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $avi_repo = $em->getRepository("AppBundle:Actividad");
        $avi = $avi_repo->find($id);
        
        $em->remove($avi);
        $em->flush();
        
        return $this->redirectToRoute('actividad_index');        
    }}
