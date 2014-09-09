<?php

namespace Par3\GolfEnLaNubeBundle\Controller\Institucion;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;


class Par3Controller extends Controller
{
	public function getIdInstitucion()
	{
		
	}
	
	public function misTarjetasAction()
	{
		return Response::create('prueba', 200); 
	}
}