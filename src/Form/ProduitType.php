<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' =>  ['class' => 'form-control', 'placeholder' => 'Nom du produit', 'label' => 'Nom:']
            ])
            ->add('description', TextareaType::class, [
                'attr' =>  ['class' => 'form-control', 'placeholder' => 'Description du produit', 'label' => 'Description:']
            ])
            ->add('prix', IntegerType::class, [
                'attr' =>  ['class' => 'form-control', 'placeholder' => 'Prix du produit', 'label' => 'Prix:']
            ])
          /*  ->add('valide', CheckboxType::class, [
                    'label'    => 'Disponible',
                    'required' => false,
                    'attr'     => ['class' => 'form-check-input']
            ])*/  

            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
