<?php

namespace FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', TextType::class, array('label'=>'Titre *',
                                              'required'=>false,
                                              'attr'=>array('class'=>'form-control')))
        ->add('text1', TextType::class, array('label'=>'Texte N° 1 *',                                              
                                              'attr'=>array('class'=>'form-control')))
        ->add('text2', TextType::class, array('label'=>'Texte N° 2',
                                              'required'=>false,
                                              'attr'=>array('class'=>'form-control')))
        ->add('text3', TextType::class, array('label'=>'Texte N° 3',
                                              'required'=>false,
                                              'attr'=>array('class'=>'form-control')))
        ->add('text4', TextType::class, array('label'=>'Texte N° 4',
                                              'required'=>false,
                                              'attr'=>array('class'=>'form-control')))
        ->add('text5', TextType::class, array('label'=>'Texte N° 5',
                                              'required'=>false,
                                              'attr'=>array('class'=>'form-control')))
        ->add('submit', SubmitType::class, array('label'=>'Validez',
                                                 'attr'=>array('class'=>'btn btn-success')))
        ->add('saveAndAdd', SubmitType::class, array('label'=>'Ajoutez des images',
                                                 'attr'=>array('class'=>'btn btn-info')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontOfficeBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_article';
    }


}
