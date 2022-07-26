<?php

namespace Hodak\SergeyBlog\User\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Hodak\SergeyBlog\User\Dto\UserRegistrationDto;

class RegistrationForm extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
        ->add('email', EmailType::class)
        ->add('plainPassword', RepeatedType::class, [
          'type' => PasswordType::class,
          'invalid_message' => 'registr.password_match',
          'options' => ['attr' => ['class' => 'registr_form.password_field']],
          'required' => true,
          'first_options'  => ['label' => 'registr_form.password'],
          'second_options' => ['label' => 'registr_form.password'],
        ])
        ->add('registration', SubmitType::class);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
       'data_class' => UserRegistrationDto::class,
    ]);
  }

}
