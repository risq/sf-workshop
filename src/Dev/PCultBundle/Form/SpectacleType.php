<?php

namespace Dev\PCultBundle\Form;

use Dev\PCultBundle\Form\RepresentationType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SpectacleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('metteurEnScene')
            ->add('synopsis')
            ->add('image')
            ->add('representations', 'collection', array(
                'type' => new RepresentationType(),
                'allow_add' => true,
                'by_reference' => false,
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dev\PCultBundle\Entity\Spectacle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dev_pcultbundle_spectacle';
    }
}
