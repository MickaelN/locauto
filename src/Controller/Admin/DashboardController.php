<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Entity\Cars;
use App\Entity\Motorization;
use App\Entity\Rental;
use App\Entity\Seat;
use App\Entity\Status;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use App\Repository\UsersRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $usersRepository = $em->getRepository(Users::class);
        $carsRepository = $em->getRepository(Cars::class);
        $rentalRepository = $em->getRepository(Rental::class);
        return $this->render('admin/dashboard.html.twig',['usersCount' => $usersRepository->usersCount(), 'carsCount' => $carsRepository->carsCount(), 'rentalsCount' => $rentalRepository->rentalCount()]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img width="80" src="assets/img/icon.svg"> Loc\'Auto')
            ->setFaviconPath('assets/img/icon.svg');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('User');
        yield MenuItem::linkToCrud('UserList', 'fas fa-users', Users::class);
        yield MenuItem::linkToCrud('Ajouter un utilisateur', 'fas fa-user-plus', Users::class)->setAction('new');
        yield MenuItem::linkToCrud('Editer un utilisateur', 'fas fa-user-edit', Users::class)->setAction('edit');
        yield MenuItem::section('Véhicule');
        yield MenuItem::linkToCrud('Liste des véhicules', 'fa fa-car', Cars::class);
        yield MenuItem::linkToCrud('Ajouter un véhicule', 'fa fa-plus', Cars::class)->setAction('new');
        yield MenuItem::linkToCrud('Editer un véhicule', 'fa fa-edit', Cars::class)->setAction('edit');
        yield MenuItem::section('Réservation');
        yield MenuItem::linkToCrud('Liste des réservations', 'fa fa-calendar', Rental::class);
        yield MenuItem::linkToCrud('Ajouter une réservation', 'fa fa-calendar-plus',Rental::class)->setAction('new');
        yield MenuItem::linkToCrud('Editer une réservation', 'fa fa-calendar-check', Rental::class)->setAction('edit');
        yield MenuItem::section();
        yield MenuItem::subMenu('Configuration','fab fa-whmcs')->setSubItems([
            MenuItem::linkToCrud('StatusList', 'fas fa-check', Status::class),
            MenuItem::linkToCrud('SeatList', 'fas fa-chair', Seat::class),
            MenuItem::linkToCrud('MotorizationList', 'fas fa-gas-pump', Motorization::class),
        ]);
    }
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
        ->setName($user->getFullname());
    }
    public function configureAssets(): Assets
    {
        $assets = Assets::new();
        return $assets->addCssFile('build/admin.css');
    }
}
