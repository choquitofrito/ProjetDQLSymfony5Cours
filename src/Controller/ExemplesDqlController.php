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
        $query = $em->createQuery("SELECT livre.titre, livre.prix FROM App\Entity\Livre livre");
        dd($query->getResult());
        return $this->render('exemples_dql/exemple_select_array_arrays.html.twig');
    }

    // exemple d'obtention d'un array d'objets

    /**
     * @Route("/exemples/dql/exemple/obtenir/exemplaires")
     */
    public function exempleObtenirExemplaires()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT exemplaire FROM App\Entity\Exemplaire exemplaire");
        dd($query->getResult());
    }

    // Regular Join vs Fetch Join

    /**
     * @Route ("/exemples/dql/exemple/obtenir/livre/avec/exemplaires")
     */
    public function exempleObtenirLivreAvecExemplaires()
    {
        $em = $this->getDoctrine()->getManager();
        $queryRegular = $em->createQuery("SELECT livre FROM App\Entity\Livre livre JOIN livre.exemplaires exemplaires");
        $livres = $queryRegular->getResult();
        // on obtient tous les exemplaires du prémier livre
        $exemplaires = $livres[0]->getExemplaires();
        dump ($exemplaires); // la collection apparait vide si on ne rajoute pas "exemplaires" dans la requête
        dump ($exemplaires[0]); // quand on accède diréctement à l'exemplaire, il est là
        dump ($exemplaires[1]); // pareil pour l'autre exemplaire

        $queryFetch = $em->createQuery("SELECT livre, exemplaires FROM App\Entity\Livre livre JOIN livre.exemplaires exemplaires");
        $livres = $queryFetch->getResult();
        // on obtient tous les exemplaires du prémier livre
        $exemplaires = $livres[0]->getExemplaires();
        dump ($exemplaires); // la collection apparait remplie car on a rajouté "exemplaires" dans la requête
        dump ($exemplaires[0]); // quand on accède diréctement à l'exemplaire, il est aussi là
        dump ($exemplaires[1]); // pareil pour l'autre exemplaire

        die();
        
    }
}
