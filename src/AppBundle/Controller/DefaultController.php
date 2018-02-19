<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Boisson;
use AppBundle\Entity\Plat;
use AppBundle\Entity\Menu;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function navbarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plats = $em->getRepository('AppBundle:Plat')->findAll();
        $menus = $em->getRepository('AppBundle:Menu')->findAll();

        return $this->render('nav.html.twig', [
            'plats' => $plats,
            'menus' => $menus
        ]);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/admin", name="admin_dashboard")
     * @Route("/admin/dashboard", name="admin_dashboard_bis")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminDashboardAction()
    {
        return $this->render(':admin:dashboard.html.twig');
    }

    /**
     * @Route("/plat", name="public_plat_index")
     * @Method("GET")
     */
    public function indexPlatAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plats = $em->getRepository('AppBundle:Plat')->findAll();

        return $this->render('public/platIndex.html.twig', array(
            'plats' => $plats,
        ));
    }



    /**
     * @Route("/menu/{id}", name="public_menu_show")
     * @Method("GET")
     */
    public function showMenuAction(Menu $menu)
    {

        return $this->render('public/menuShow.html.twig', array(
            'menu' => $menu,

        ));
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('public/contact.html.twig', array());
    }


}