<?php

namespace App\Controller;

use App\Service;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default")
     */
    public function index(
        Service\DataService $dataService
    )
    {
        return $this->render('Default/index.html.twig', [
            'data' => $dataService->getDataList()
        ]);
    }
}
