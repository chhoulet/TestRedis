<?php

namespace FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('filename', FileType::class, array('label'=>'Ajoutez une image'))
        ->add('filename1', FileType::class, array('label'=>'Ajoutez une image',
                                                  'required'=>false))
        ->add('filename2', FileType::class, array('label'=>'Ajoutez une image',
                                                  'required'=>false))
        ->add('filename3', FileType::class, array('label'=>'Ajoutez une image',
                                                  'required'=>false))
        ->add('filename4', FileType::class, array('label'=>'Ajoutez une image',
                                                  'required'=>false))
        ->add('filename5', FileType::class, array('label'=>'Ajoutez une image',
                                                  'required'=>false))
        ->add('Valider', SubmitType::class, array('attr'=>array('class'=>'btn btn-success')))
        ->add('SaveAndCreate', SubmitType::class, array('label'=>'Validez et sélectionner d\'autres photos',
                                                        'attr'=>array('class'=>'btn btn-info')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontOfficeBundle\Entity\Image'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_image';
    }


}
