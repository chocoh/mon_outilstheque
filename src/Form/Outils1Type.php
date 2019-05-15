<?php

namespace App\Form;

use App\Entity\Outils;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Outils1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_outil')
            ->add('descriptifs')
            ->add('date_enregistrement')
            ->add('duree_emprunt')
            ->add('categorie')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Outils::class,
        ]);
    }
}
