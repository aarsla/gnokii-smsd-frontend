<?php

namespace SMS\AdminBundle\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
use Lexik\Bundle\FormFilterBundle\Filter\ORM\Expr;
use Doctrine\ORM\QueryBuilder;


class InboxFilterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->add('number', 'filter_text', array(
										    	'label' => 'Number',
										    	'condition_pattern' => FilterOperands::STRING_BOTH,
										    	'attr' => array()
										    	));
    	
        $builder->add('text', 'filter_text', array(
										        'label' => 'Text',
										        'condition_pattern' => FilterOperands::STRING_BOTH,
										        'attr' => array()
										        ));
        
        $builder->add('insertdate', 'filter_datetime_range', array(
        		'label' => false,
        		'left_datetime_options' => array('label' => 'From'),
        		'right_datetime_options' => array('label' => 'To'),
        		'data' => array(
        				'label' => false,
        				'left_datetime' => new \DateTime('last day'),
        				'right_datetime' => new \DateTime('now'))
        ));
        

    }

    public function getName()
    {
        return 'inbox_filter';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering')
        ));
    }
}