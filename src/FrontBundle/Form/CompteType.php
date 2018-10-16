<?php

namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder
            ->add('enabled')
            ->add('roles', ChoiceType::class, array(
                'label'=>'Role',
                'choices'   => array(
                    'ROLE_VISITEUR'   => 'Visiteur',
                    'ROLE_COMPTABLE'   => 'Comptable',
                    'ROLE_ADMIN'   => 'Administrateur',
                    'ROLE_SUPER_ADMIN'   => 'Super Admin',
                ),
                'expanded' => true,
                'multiple'  => true
            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontBundle\Entity\Compte'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontbundle_compte';
    }


}
