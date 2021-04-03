<?php

namespace App\Controller\Front;

use App\Entity\Techno;
use App\Entity\Type;
use App\Entity\User;
use App\Entity\Workout;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/", name="app_front")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(WorkoutCrudController::class)->generateUrl().'&menuIndex=0');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BlogTechno')
            ->setFaviconPath('pictures/admin-keys.png')
            ->disableUrlSignatures();
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use this method if you don't want to display the name of the user
            ->displayUserName(true)

            // you can use any type of menu item, except submenus
            ->addMenuItems([
                MenuItem::linkToRoute('My Profile TODO', 'fa fa-id-card', '...'),
                MenuItem::linkToRoute('Settings TODO', 'fa fa-user-cog', '...', ['...' => '...']),
            ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Workouts', 'fas fa-dumbbell', Workout::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Types', 'fas fa-tags', Type::class);
        yield MenuItem::linkToCrud('Technos', 'fas fa-cogs', Techno::class);
        yield MenuItem::section('');
        yield MenuItem::linkToLogout('Log out', 'fa fa-door-open');
    }
}
