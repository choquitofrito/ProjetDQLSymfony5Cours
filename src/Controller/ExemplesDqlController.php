<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExemplesDqlController extends AbstractController
{
    /**
     * @Route("/exemples/dql/exemple/select/array/arrays")
     */
    public function exempleSelectArrayArrays()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery ("SELECT livre.titre, livre.prix FROM App\Entity\Livre livre");
        dd ($query->getResult());
        return $this->render('exemples_dql/exemple_select_array_arrays.html.twig');
    }

    // exemple d'obtention d'un array d'objets

    /**
     * @Route("/exemples/dql/exemple/obtenir/exemplaires")
     */
    public function exempleObtenirExemplaires (){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery ("SELECT exemplaire FROM App\Entity\Exemplaire exemplaire");
        dd ($query->getResult());
    }

    // join

    /**
     * @Route ("/exemples/dql/exemple/obtenir/livre/avec/exemplaires")
     */
    public function exempleObtenirLivreAvecExemplaires (){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery ("SELECT livre FROM App\Entity\Livre livre JOIN livre.exemplaires");
        dd ($query->getResult());
        
        

    }


}
