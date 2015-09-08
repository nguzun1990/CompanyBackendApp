<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompanyController extends Controller
{
    /**
     * @Route("/company", name="company")
     */
    public function indexAction(Request $request)
    {
        $params = array(
            'idno' => $request->get('idno'),
            'title' => $request->get('title'),
            'address' => $request->get('address'),
            'director' => $request->get('director'),
        );
        $em = $this->getDoctrine()->getEntityManager();
        $companies = $this->getDoctrine()
                        ->getRepository('AppBundle:Company')
                        ->getList($params);
        $response = new JsonResponse($companies);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');

        return $response;
    }
}
