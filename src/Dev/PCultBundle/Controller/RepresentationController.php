<?php

namespace Dev\PCultBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dev\PCultBundle\Entity\Representation;
use Dev\PCultBundle\Form\RepresentationType;

/**
 * Representation controller.
 *
 */
class RepresentationController extends Controller
{

    /**
     * Lists all Representation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DevPCultBundle:Representation')->findAll();

        return $this->render('DevPCultBundle:Representation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Representation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Representation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('representation_show', array('id' => $entity->getId())));
        }

        return $this->render('DevPCultBundle:Representation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Representation entity.
    *
    * @param Representation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Representation $entity)
    {
        $form = $this->createForm(new RepresentationType(), $entity, array(
            'action' => $this->generateUrl('representation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Representation entity.
     *
     */
    public function newAction()
    {
        $entity = new Representation();
        $form   = $this->createCreateForm($entity);

        return $this->render('DevPCultBundle:Representation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Representation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevPCultBundle:Representation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Representation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DevPCultBundle:Representation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Representation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevPCultBundle:Representation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Representation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DevPCultBundle:Representation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Representation entity.
    *
    * @param Representation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Representation $entity)
    {
        $form = $this->createForm(new RepresentationType(), $entity, array(
            'action' => $this->generateUrl('representation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Representation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevPCultBundle:Representation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Representation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('representation_edit', array('id' => $id)));
        }

        return $this->render('DevPCultBundle:Representation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Representation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DevPCultBundle:Representation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Representation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('representation'));
    }

    /**
     * Creates a form to delete a Representation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('representation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
