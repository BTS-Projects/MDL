<?php

namespace App\Form;

use App\Entity\Atelier;
use App\Entity\Theme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function dd;

class AddInfosType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options): void {

        $builder
                ->add('choose_form', ChoiceType::class, [
                    'choices' => [
                        'Atelier' => $choice = 'atelier',
                        'Theme' => $choice = 'theme',
                        'Vacation' => $choice = 'vacation',
                    ]
                ])
                ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {

                    $form = $event->getForm();
                    $config = $form->get('choose_form')->getConfig();
                    $options = $config->getOptions();
                    $data = $event->getData();

                    if ($data == 'atelier') {
                        
                        $form->getParent()
                        ->add('libelle', TextType::class)
                        ->add('nbPlaceMaxi')
                        ->add('themes', EntityType::class, [
                            'class' => Theme::class,
                            'choice_label' => 'libelle',
                            'expanded' => true,
                            'multiple' => true,
                        ])
                        ;
                    } else if ($data == 'theme') {
                        $form->getParent()
                        ->add('libelle', TextType::class)
                        ->add('ateliers', EntityType::class, [
                            'class' => Atelier::class,
                            'choice_label' => 'libelle',
                            'expanded' => true,
                            'multiple' => true,
                        ])
                        ;
                    } else if ($data == 'vacation') {
                        $form->getParent()
                        ->add('dateheureDebut', DateType::class)
                        ->add('dateheureFin', DateType::class)
                        ->add('atelier', EntityType::class, [
                            'class' => Atelier::class,
                            'choice_label' => 'libelle',
                            'expanded' => true,
                            'multiple' => true,
                        ])
                        ;
                    }
                });

//        $builder->get('choose_form')->addEventListener(
//                FormEvents::POST_SUBMIT,
//                function (FormEvent $event) {
//                    $form = $event->getForm();
//                    if ($form->getData() == 'atelier') {
//                        
//                    } else if ($form->getData() == 'theme') {
//                        $theme = new Theme();
////                        $form->getParent()->
////                                'libelleTheme', EntityType::class, [
////                                    'class' => Theme::class,
////                                    'choice_label' => 'libelle',
////                                    'expanded' => false,
////                                    'multiple' => false,
////                                ])
////                                ->add('ateliersTheme', EntityType::class, [
////                                    'class' => Theme::class,
////                                    'choice_label' => 'ateliers',
////                                    'expanded' => true,
////                                    'multiple' => true,
////                        ])
//                        ;
//                    } else {
//                        
//                    }
//                }
//        );
    }

    private function addThemeFields(FormInterface $form, Theme $theme) {
        dd($theme);
        return null;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
                // Configure your form options here
        ]);
    }

}
