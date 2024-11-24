<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
        $formBuilder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [new Length(min: 2, minMessage: 'Le prénom doit contenir au moins 2 caractères')],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => [new Length(min: 2, minMessage: 'Le nom doit contenir au moins 2 caractères')],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Message',
                'constraints' => [new Length(min: 3, minMessage: 'Le message doit contenir au moins 3 caractères')],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ]);
    }

    public function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
