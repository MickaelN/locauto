<?php

namespace App\Controller\Admin;

use App\Entity\Motorization;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MotorizationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Motorization::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
