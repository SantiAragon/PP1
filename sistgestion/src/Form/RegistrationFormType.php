<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')

            ->add('plainPassword', PasswordType::class, [
                'error_bubbling' => false, // Esta opción permite que los errores se envíen al formulario principal
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingresa una contraseña',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Tu contraseña debe tener {{ limit }} o mas caracteres',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nombre', TextType::class, [
                'error_bubbling' => false, // Esta opción permite que los errores se envíen al formulario principal
                'constraints' => [
                new NotBlank([
                    'message' => 'Por favor, ingresa un nombre',
                ]),
                new Length([
                    'min' => 3,
                    'max' => 10,
                    'minMessage' => 'Tu nombre debe tener {{ limit }} o mas caracteres',
                    'maxMessage' => 'Tu nombre debe tener {{ limit }} o menos caracteres',
                ]),
            ],
            ])
            
            ->add('apellido', TextType::class, [
                'error_bubbling' => false, // Esta opción permite que los errores se envíen al formulario principal
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingresa un apellido',
                    ]),
                    new Length([
                        'min' => 3,
                        'max' => 10,
                        'minMessage' => 'Tu apellido debe tener {{ limit }} o mas caracteres',
                        'maxMessage' => 'Tu apellido debe tener {{ limit }} o menos caracteres',
                    ]),
                ],
            ])
            ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
