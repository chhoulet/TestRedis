<?php

namespace FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('author', TextType::class, array('label'=>'Nom d\'utilisateur',
                                                       'attr'=>array('class'=>'form-control')))
        ->add('mail', TextType::class, array('label'=>'Adresse mail',
                                                       'attr'=>array('class'=>'form-control')))
        ->add('phone', TextType::class, array('label'=>'Téléphone',
                                                       'attr'=>array('class'=>'form-control')))
        ->add('title', TextType::class, array('label'=>'Titre',
                                              'required'=>false,
                                              'attr'=>array('class'=>'form-control')))
        ->add('main', TextareaType::class, array('label'=>'Votre message',
                                                 'attr'=>array('class'=>'form-control','row'=>6)))       
        ->add('Envoyer', SubmitType::class, array('label'=>'Envoyer',
                                                  'attr'=>array('class'=>'btn btn-success')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontOfficeBundle\Entity\Message'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_message';
    }


}
