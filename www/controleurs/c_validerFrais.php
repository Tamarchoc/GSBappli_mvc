<?php

/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$mois = getMois(date('d/m/Y'));

switch ($action) {

    case 'selectionnerVisiteursMois':

        $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        $lesCles = array_keys($visiteurs_a_valider);
        $moisASelectionner = $lesCles[0];
        $mois_a_selectionner = getLesDouzeDerniersMois($mois);
        $lesCles = array_keys($mois_a_selectionner);
        $moisASelectionner = $lesCles[0];
        include 'vues/v_listeMoisVisiteur.php';

        break;

    case 'afficherDonnees' :
        $idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $unMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        //var_dump($unMois, $idVisiteur);
        $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        $visiteurASelectionner = $idVisiteur;
        // var_dump($visiteurs_a_valider);
        $mois_a_selectionner =getLesDouzeDerniersMois($mois);
        $moisASelectionner = $unMois;
        // var_dump($mois_a_selectionner);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois );
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $unMois );
        if(empty($lesFraisForfait)) {
            ajouterErreur('il n y a rien a afficher');
        include 'vues/v_erreurs.php';
         header("Refresh: 3;URL=index.php?uc=validerFrais&action=selectionnerVisiteursMois");
    } else {
        include 'vues/v_valider.php';
    }
   break;  
   case 'corrigerElementForfaitises' :
        $idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $unMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $lesFraisForfait = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT,FILTER_FORCE_ARRAY);
        //var_dump($unMois, $idVisiteur);
        $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        $visiteurASelectionner = $idVisiteur;
        // var_dump($visiteurs_a_valider);
        $mois_a_selectionner =getLesDouzeDerniersMois($mois);
        $moisASelectionner = $unMois;
        // var_dump($mois_a_selectionner);
        $pdo->majFraisForfait($idVisiteur, $unMois, $lesFraisForfait);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois );
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $unMois );
        include 'vues/v_valider.php';
   break;  

    case 'afficherCorrection' :
         $id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING);
         $idVisiteur = filter_input(INPUT_POST,'lstVisiteur', FILTER_SANITIZE_STRING);
         $unMois = filter_input(INPUT_POST,'lstMois', FILTER_SANITIZE_STRING);
         $date = filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING);
         $libelle = filter_input(INPUT_POST,'libelle', FILTER_SANITIZE_STRING);
         $montant = filter_input(INPUT_POST,'montant', FILTER_SANITIZE_STRING);
        var_dump($id,$idVisiteur,$unMois,$date,$libelle,$montant);
        $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        $visiteurASelectionner = $idVisiteur;
        // var_dump($visiteurs_a_valider);
        $mois_a_selectionner =getLesDouzeDerniersMois($mois);
        $moisASelectionner = $unMois;
        // var_dump($mois_a_selectionner);
       $pdo->majFraisHorsForfait($id,$idVisiteur,$unMois, $date, $libelle,$montant);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois );
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $unMois );
        include 'vues/v_valider.php';
         break;
    case 'afficherSuppresion':
        $id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING);
         $idVisiteur = filter_input(INPUT_POST,'lstVisiteur', FILTER_SANITIZE_STRING);
         $unMois = filter_input(INPUT_POST,'lstMois', FILTER_SANITIZE_STRING);
         $date = filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING);
         $libelle = filter_input(INPUT_POST,'libelle', FILTER_SANITIZE_STRING);
         $montant = filter_input(INPUT_POST,'montant', FILTER_SANITIZE_STRING);
        var_dump($id,$idVisiteur,$unMois,$date,$libelle,$montant);
        $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        $visiteurASelectionner = $idVisiteur;
        // var_dump($visiteurs_a_valider);
        $mois_a_selectionner =getLesDouzeDerniersMois($mois);
        $moisASelectionner = $unMois;
        // var_dump($mois_a_selectionner);
       $pdo->majFraisHorsForfait($id,$idVisiteur,$unMois, $date, $libelle,$montant);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois );
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $unMois );
        include 'vues/v_valider.php';
         break;
        
     
        }