<?php

namespace SMS\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Finder\Finder;

class SMSType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', null, array('label' => 'Phone number',
            		'required' => true,
            		'attr' => array(
            				'placeholder' => '+31972123456'
            		)
            ))
        	->add('text', null, array(
        			'label' => 'Message',
        			'required' => true,
        			'attr' => array(
        					'placeholder' => 'Hello there!'
        			)
        	));
                
        /*
        $builder->add('isVisible', 'checkbox', array(
        		'label' => 'admin.device.table.visible',
        		'required' => false,
        ));
        */
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SMS\AdminBundle\Entity\SMS'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_sms';
    }
}
