<?php

namespace App\Controller\Admin;

use App\Entity\Acteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActeurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Acteur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            NumberField::new('cachet'),
        ];
    }
}
