<?php

namespace App\Controller\Api;

use App\Entity\Workout;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class WorkoutCreateController extends AbstractController
{
    //private $security;
    private $userRepository;

    public function __construct( /* Security $security, */ UserRepository $userRepository)
    {
        //$this->security = $security;
        $this->userRepository = $userRepository;
    }

    public function __invoke(Workout $data, Request $request)
    {
        //$data->setMaker($this->security->getUser());
        $data->setMaker($this->userRepository->findOneBy(["id" => "1"]));

        return $data;
    }
}
