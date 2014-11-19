<?php

namespace Dev\PCultBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dev\PCultBundle\Entity\Spectacle;
use Dev\PCultBundle\Form\SpectacleType;

/**
 * Spectacle controller.
 *
 */
class SpectacleController extends Controller
{

    /**
     * Lists all Spectacle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DevPCultBundle:Spectacle')->findAll();

        return $this->render('DevPCultBundle:Spectacle:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Spectacle entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Spectacle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('spectacle_show', array('id' => $entity->getId())));
        }

        return $this->render('DevPCultBundle:Spectacle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Spectacle entity.
    *
    * @param Spectacle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Spectacle $entity)
    {
        $form = $this->createForm(new SpectacleType(), $entity, array(
            'action' => $this->generateUrl('spectacle_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Spectacle entity.
     *
     */
    public function newAction()
    {
        $entity = new Spectacle();
        $form   = $this->createCreateForm($entity);

        return $this->render('DevPCultBundle:Spectacle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Spectacle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevPCultBundle:Spectacle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Spectacle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DevPCultBundle:Spectacle:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Spectacle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevPCultBundle:Spectacle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Spectacle entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DevPCultBundle:Spectacle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Spectacle entity.
    *
    * @param Spectacle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Spectacle $entity)
    {
        $form = $this->createForm(new SpectacleType(), $entity, array(
            'action' => $this->generateUrl('spectacle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Spectacle entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevPCultBundle:Spectacle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Spectacle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('spectacle_edit', array('id' => $id)));
        }

        return $this->render('DevPCultBundle:Spectacle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Spectacle entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DevPCultBundle:Spectacle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Spectacle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('spectacle'));
    }

    /**
     * Creates a form to delete a Spectacle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('spectacle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
