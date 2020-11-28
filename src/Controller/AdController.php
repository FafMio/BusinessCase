<?php

namespace App\Controller;

use App\Entity\Ad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ad/{id}", name="ad_ad", requirements={"id": "\d+"})
     */
    public function ad(Ad $ad): Response
    {
        // dd($ad);
        return $this->render('ad/ad.html.twig', [
            'ad' => $ad,
        ]);
    }
}
