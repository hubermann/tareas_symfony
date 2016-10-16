<?php

namespace TareasSymfony\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('firstname')
            ->add('lastname')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('role', 'choice', 
    array( 'choices' => array( 'role_admin' => 'Administrator', 'role_user' => 'UserCommon'), 'placeholder' => 'Select' )
    )

            ->add('is_active', 'checkbox')
            ->add('save','submit', array('label' => 'save user') )
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TareasSymfony\UserBundle\Entity\User'
        ));
    }
}
