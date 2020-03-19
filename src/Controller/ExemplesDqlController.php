<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExemplesDqlController extends AbstractController
{
    /**
     * @Route("/exemples/dql/exemple/select/array/arrays", name="exemples_dql")
     */
    public function exempleSelectArrayArrays()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery ("SELECT livre.titre, livre.prix FROM App\Entity\Livre livre");
        dd ($query->getResult());
        return $this->render('exemples_dql/exemple_select_array_arrays.html.twig');
    }

    



}
