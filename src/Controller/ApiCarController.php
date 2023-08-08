<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\CarList;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ApiCarController extends AbstractController
{
    #[Route('/api/data_list', name: 'app_api_data_list')]
    #[IsGranted('ROLE_LIST_VIEW')]
    public function index(
        #[CurrentUser] ?User $user,
        Request $request,
        CarList $carList
    ): JsonResponse
    {
        try {
            $data = $request->toArray();
            $result = $carList->allCar($data);

            return $this->json($result);
        } catch (Exception $e) {
            return $this->json(['error' => $e->getMessage()]);
        }
    }
}
