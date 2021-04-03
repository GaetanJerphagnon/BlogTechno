<?php

namespace App\Controller\Front;

use App\Entity\Workout;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WorkoutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workout::class;
    }

    public function configureActions(Actions $actions): Actions 
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            IntegerField::new('rating'),
            TextEditorField::new('description')->setNumOfRows(10)->hideOnIndex(),
            DateTimeField::new('doneAt')->setFormat('dd/MM/yyyy'),
            AssociationField::new('maker', 'Maker'),
            AssociationField::new('techno', 'Techno'),
            AssociationField::new('types', 'Types'),
            BooleanField::new('isDisplayed'),
            DateTimeField::new('createdAt')->setFormat('dd/MM/yyyy')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->setFormat('dd/MM/yyyy')->onlyOnDetail(),
        ];
    }
   
}
