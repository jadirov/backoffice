<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditPasswordType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('login', TextType::class, array(
                    'label' => 'Login',
                    'disabled' => true,
                    'attr' => array(
                        'class' => 'form-control login',
                        'placeholder' => 'Email',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('password', PasswordType::class, array(
                    'label' => 'Nouveau mot de passe',
                    'attr' => array(
                        'class' => 'form-control password',
                        'placeholder' => 'Nouveau mot de passe',
                    ),
                )
            )->add('oldPassword', PasswordType::class, array(
                    'label' => 'Mot de passe actuel',
                    'attr' => array(
                        'class' => 'form-control old-password',
                        'placeholder' => 'Mot de passe actuel',
                    ),
                )
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\User'
        ));
    }
}
