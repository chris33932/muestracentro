<?php

namespace App\Form;

use App\Entity\Victima;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VictimaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('tipoDocumento')
            ->add('nro_documento')
            ->add('sexo')
            ->add('ocupacion')
            ->add('genero')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Victima::class,
        ]);
    }
}
