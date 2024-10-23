<?php

namespace App\Form;

use App\Entity\RandomTables;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RandomTablesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TableName', TextType::class, [
                'required' => true,
            ])
            ->add('Dice', ChoiceType::class, [
                'choices' => [
                    '10-sided Dice' => [
                        '1d10 for 10 lines' => 'd10',
                        '2d10 for 25 lines' => '2d10/4',
                        '2d10 for 50 lines' => '2d10/2',
                        '2d10 for 100 lines' => '2d10',
                    ],
                    '20-sided Dice' => 'd20',
                    '12-sided Dice' => 'd12',
                    '8-sided Dice' => 'd8',
                    '6-sided Dice' => 'd6',
                    '4-sided Dice' => 'd4',
                ],
            ])
            ->add('TableType', ChoiceType::class, [
                'choices' => [
                    'Plain Text' => 'plaintext',
                    'Select from D&D api database' => 'apiData',
                    'Both' => 'both',
                ],
            ])
            ->add('Theme', ChoiceType::class, [
                'choices' => [
                    'Choose a color theme for your table' => [
                        'the Green Pastures and Forests' => 'grassland',
                        'the Dry and Unhospitable Lands' => 'desert',
                        'the Harsh and Cold Mountains of the North' => 'mountain',
                        'the Boundless Void of the Astral Plane' => 'astral',
                        'the Liveliness and Warmth of the densily populated cities' => 'city',
                    ],
                ],
            ])
            ->add('Content', CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
            ]);

            /* $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                 function(FormEvent $event): void {
                    $form = $event->getForm();

                    $data = $event->getData();

                    $content = $data->getContent();

                 });*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RandomTables::class,
        ]);
    }
}
