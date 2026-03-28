<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $years = range(date('Y') - 5, date('Y'));
        rsort($years);
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'years' => $years,
                'label' => 'Datum',
                'label_attr' => ['class' => 'col-form-label'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('rating_morning', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Kleur ochtend',
                'label_attr' => ['class' => 'col-form-label'],
                'required' => false,
            ])
            ->add('rating_afternoon', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Kleur middag',
                'label_attr' => ['class' => 'col-form-label'],
                'required' => false,
            ])
            ->add('rating_evening', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Kleur avond',
                'label_attr' => ['class' => 'col-form-label'],
                'required' => false,
            ])
            ->add('content_positive', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 10],
                'label' => 'Positief',
                'label_attr' => ['class' => 'col-form-label'],
                'required' => false,
            ])
            ->add('content_negative', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 20],
                'label' => 'Negatief',
                'label_attr' => ['class' => 'col-form-label'],
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success'],
            ]);
    }
}
