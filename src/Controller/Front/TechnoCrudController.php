<?php

namespace App\Controller\Front;

use App\Entity\Techno;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TechnoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Techno::class;
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
            ImageField::new('image')->setUploadDir('public/pictures/')->setBasePath('pictures/'),
            AssociationField::new('workouts', 'Workouts')->hideOnForm(),
            DateTimeField::new('createdAt')->setFormat('dd/MM/yyyy')->onlyOnDetail(),
            DateTimeField::new('updatedAt')->setFormat('dd/MM/yyyy')->onlyOnDetail(),
            
        ];
    }
   
}
