<?php

namespace App\Form;

use App\Entity\RandomTables;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RandomTables1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TableName')
            ->add('Dice')
            ->add('TableType')
            ->add('Theme')
            ->add('tables', CollectionType::class, [
                'entry_type' => TableContentType::class,
            ])
            // ->add('Content', CollectionType::class, [
            //     'entry_type'=> TextType::class,
            //     'keep_as_list' => true,
            // ])
//             ->add('DungeonMaster', EntityType::class, [
//                 'class' => User::class,
// 'choice_label' => 'id',
//             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RandomTables::class,
        ]);
    }
}
