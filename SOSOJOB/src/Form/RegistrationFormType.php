<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Roles;
//use App\Form\StringToArrayTransformer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\CallbackTransformer;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new StringToArrayTransformer();
        $builder
            ->add('prenom', TextType::class, ['label' => false])
            ->add('nom', TextType::class, ['label' => false])
            ->add('adresseMail', EmailType::class, ['label' => false, 'error_bubbling' => true])
            ->add('num', TelType::class, ['label' => false])

            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les champs du mot de passe doivent correspondre',
                'required' => true,
                'first_options'  => ['label' => false],
                'second_options' => ['label' => false],
                'error_bubbling' => true,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer votre Mot de Passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre Mot de Passe doit contenir au moins {{ limit }} caractères',
                        'max' => 4096,
                    ]),
                ],
            ])

            
            ->add('roles', ChoiceType::class, [
                'label' => false,
                 'error_bubbling' => true,
                 'multiple' => false, 
                 'expanded' => true,
                 'choices' => [
                     'Client' => 'ROLE_CLIENT',
                     'Jober' => 'ROLE_FOURNISSEUR',
                 ],
                 'choice_attr' => [
                    'checked'=>false,
                 ],
                 'label_attr'=>[
                    'class'=>'radio-inline', 
                                               
              ],
         ])
        
        ->add('condition', CheckboxType::class, [
            'mapped' => false,
            'label' => "En m'inscrivant, j'accepte les #condition# et #confidentialité# de SOSJOB",
            'constraints' => new IsTrue([
            'message' => 'You should is available.',
         ]),
         'label_attr'=>[
             'style' => 'color:black',
         ],

        ])
        ;

        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                // transform the array to a string
                return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                // transform the string back to an array
                return [$rolesString];
            }
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
