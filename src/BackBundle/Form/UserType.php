<?php

namespace BackBundle\Form;
//use BackBundle\Entity\User;
use BackBundle\Entity\User;
use BackBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
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
            ->add('name', TextType::class, array(
                    'label' => 'Nom',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control name input-required',
                        'placeholder' => 'Nom',
                        'autocomplete' => 'off'
                    ),
                )
            )->add('firstName', TextType::class, array(
                    'label' => 'Prenom',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control firstName input-required',
                        'placeholder' => 'Prenom',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('login', TextType::class, array(
                    'label' => 'Login',
//                    'disabled' => true,
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control login input-required',
                        'placeholder' => 'Login',
                        'autocomplete' => 'off'
                    ),
                )
            )
//               ->add('email', TextType::class, array(
//                    'label' => 'Email',
//                    'required' => true,
//                    'disabled' => true,
//                    'attr' => array(
//                        'class' => 'form-control email',
//                        'placeholder' => 'nom.prenom',
//                        'autocomplete' => 'off'
//                    ),
//
//                )
//            )
            ->add('password', PasswordType::class, array(
                    'label' => 'Mot de passe',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control password input-required',
                        'placeholder' => 'Mot de passe',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('title', TextType::class, array(
                    'label' => 'Fonction',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Fonction',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('description', TextareaType::class, array(
                    'label' => 'Description',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Ingénieur, Développeur,...',
                        'autocomplete' => 'off'
                    ),

                )
            )
            ->add('address', TextType::class, array(
                    'label' => 'Adresse',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control address',
                        'placeholder' => 'Adresse',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('postalCode', NumberType::class, array(
                    'label' => 'Code postal',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control postalCode',
                        'placeholder' => '75001',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('city', TextType::class, array(
                    'label' => 'Ville',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control city',
                        'placeholder' => 'Paris',
                    ),

                )
            )->add('country', TextType::class, array(
                    'label' => 'Pays',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control country',
                        'placeholder' => 'France',
                    ),

                )
            )
            ->add('site', ChoiceType::class, array(
                    'label' => 'Site',
                    'choices' => array(
                        "Saint-Mandé" => "Saint-Mandé",
                        "Luxembourg" => "Luxembourg",
                        "Issy-Les-Moulineaux" => "Issy-Les-Moulineaux",
                        "Maroc" => "Maroc"
                    ),
                    'attr' => array(
                        'class' => 'form-control site',
                        'placeholder' => 'site',
                    ),

                )
            )->add('group', HiddenType::class, array(
                    'label' => '',
                    'attr' => array(
                        'class' => 'select-groups',
                        'autocomplete' => 'off'

                    ),
                )
            )
            ->add('picture', FileType::class, array(
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,
            )
            )
            ->add('phone', TextType::class, array(
                    'label' => 'Fix',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control phone',
                        'placeholder' => '0105020304',
                        'autocomplete' => 'off'
                    ),

                )
            )
            ->add('disabled', CheckboxType::class, array(
                'label' => 'Désactiver',
                'required' => false,
//                'attr' => array(
//                    'class' => 'control-label',
//                    'placeholder' => 'Désactiver'
//
//                ),

            ))
            ->add('proxyadresse' , TextType::class, array(
                'label' => 'SMTP',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                    'autocomplete' => 'off'
    ),
            ))
            ->add('debloq', CheckboxType::class, array(
                'label' => 'Déblocker',
                'required' => false,
//                'attr' => array(
//                    'class' => 'control-label',
//                    'placeholder' => 'Déblocker'
//                ),
            ))->add('mobile', TextType::class, array(
                    'label' => 'Mobile',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control mobile',
                        'placeholder' => '0601020304',
                        'autocomplete' => 'off'
                    ),

                )
            );
        $builder
            ->add('at',ChoiceType::class,array(
                'label' => 'Mail',
                'required' => false,
                'choices'=>array(
                '42consulting.fr'=>'1',
                '42consulting.lu'=>'2',
                '42mediatvcom.fr'=>'3',
                '42consulting.ma'=>'4',
                '42consulting.nl'=>'5',
            ),
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'service',
                ),
                ));


//        $addServiceListener = function(FormEvent $event){
//            $form = $event->getForm();
//            $data = $event->getData();
//
////            $services= array();
//
//            switch($data[User::AT()]){
//                case '1': // If at == '1'
//                    $services = array(
//                        '42Consulting Paris'=>'Saint-Mandé',
////                        'choice1_2'=>'1_2',
////                        'choice1_3'=>'1_3',
//                    );
//                    break;
//                case '2': // If at == '2'
//                    $services = array(
//                        '42Consulting Lux'=>'Luxembourg',
////                        'choice2_2'=>'2_2',
////                        'choice2_3'=>'2_3',
//                    );
//                    break;
//                case '3': // If at == '3'
//                    $services = array(
//                        '42MediaTelecom'=>'Issy-Les-Moulineaux',
////                        'choice3_2'=>'3_2',
////                        'choice3_3'=>'3_3',
//                    );
//                    break;
//                case '4': // If at == '4'
//                    $services = array(
//                        '42Consulting Maroc'=>'Casablanca',
//                    );
//                break;
//            }

//           ->add('service',ChoiceType::class,array('choices'=>array(
//                            "42Consulting Paris" => "Saint-Mandé",
//                            "42Consulting Lux" => "Luxembourg",
//                            "42MediaTelecom" => "Issy-Les-Moulineaux",
//                            "42Consulting Maroc" => "Casablanca",
//                            "42Consulting Lux" => "Luxembourg",
//
//            ),));
        }
//        $builder->addEventListener(FormEvents::PRE_SET_DATA, $addServiceListener);
//        $builder->addEventListener(FormEvents::PRE_SUBMIT, $addServiceListener);
//        $builder
//            ->add('at', ChoiceType::class, array(
//                    'label' => ' ',
//                    'choices' =>array(
//                        "42consulting.fr" => "42consulting.fr",
//                        "42consulting.lu" => "42consulting.lu",
//                        "42mediatvcom.fr" => "42mediatvcom.fr",
//                        "42consulting.ma" => "42consulting.ma",
//                        "42consulting.nl" => "42consulting.nl",
//                    ),
//                    'attr' => array(
//                        'class' => 'form-control',
//                        'placeholder' => 'service',
//                    ),
//
//
//                )
//            );
//        $formModifier = function (FormInterface $form, User $at= null) {
//            $services = null === $at ? array() :$at->getService();
//
//            $form->add('service', ChoiceType::class, array(
//                        'label' => 'Service',
//                        'choices' => array(
//                            "42Consulting Paris" => "Saint-Mandé",
//                            "42Consulting Lux" => "Luxembourg",
//                            "42MediaTelecom" => "Issy-Les-Moulineaux",
//                            "42Consulting Maroc" => "Casablanca"
//                        ),
//                        'attr' => array(
//                            'class' => 'form-control service',
//                            'placeholder' => 'service',
//                        ),
//
//
//                    )
//                );
//
//        };
//        $builder->addEventListener(
//            FormEvents::PRE_SET_DATA,
//            function (FormEvent $event) use ($formModifier) {
//                $data = $event->getData();
//
//                $formModifier($event->getForm(), $data-);
//            }
//        );
//
//        $builder->get('at')->addEventListener(
//            FormEvents::POST_SUBMIT,
//            function (FormEvent $event) use ($formModifier) {
//                $at = $event->getForm()->getData();
//
//                $formModifier($event->getForm()->getParent(), $at);
//            }
//        );


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
