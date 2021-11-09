<?php

namespace App\Controller\Admin;

use App\Entity\Rental;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class RentalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rental::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()
    
            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()
        ;
    }
}
