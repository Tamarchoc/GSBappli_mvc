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
$idVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
$unMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$libelle = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);
$montant = filter_input(INPUT_POST, 'montant', FILTER_SANITIZE_STRING);
$lesFraisF=filter_input(INPUT_POST, 'lesFrais',FILTER_DEFAULT,FILTER_FORCE_ARRAY);
$visiteurs_a_valider = $pdo->getLesVisiteursAValider();
$visiteurASelectionner = $idVisiteur;
$mois_a_selectionner = getLesDouzeDerniersMois($mois);
$moisASelectionner = $unMois;
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $unMois);
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois);

switch ($action) {

    case 'selectionnerVisiteursMois':
        $lesCles = array_keys($visiteurs_a_valider);
        $visiteurASelectionner = $lesCles[0];
        $lesCles1 = array_keys($mois_a_selectionner);
        $moisASelectionner = $lesCles1[0];
        include 'vues/v_listeMoisVisiteur.php';

        break;

    case 'afficherDonnees' :
        if (empty($lesFraisForfait)) {
            ajouterErreur('il n y a rien a afficher');
            include 'vues/v_erreurs.php';
            header("Refresh: 3;URL=index.php?uc=validerFrais&action=selectionnerVisiteursMois");
        } else {
            include 'vues/v_valider.php';
        }
        break;
    case 'corrigerElementForfaitises' :
        $pdo->majFraisForfait($idVisiteur, $unMois, $lesFraisF);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $unMois);
        include 'vues/v_valider.php';
        break;

    case 'afficherCorrection' :
        if (isset($_POST['corrigerFHF'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            var_dump($id, $idVisiteur, $unMois, $date, $libelle, $montant);
            $pdo->majFraisHorsForfait($id, $idVisiteur, $unMois, $date, $libelle, $montant);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois);
            include 'vues/v_valider.php';
        } elseif (isset($_POST['supprimerFHF'])) {
            $idFrais = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            $pdo->supprimerFraisHorsForfait($idFrais);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois);
            include 'vues/v_valider.php';
        } elseif (isset($_POST['reporterFHF'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            $libelle2 = 'refusé'.$libelle;
            $pdo->majFraisHorsForfait($id, $idVisiteur, $unMois, $date, $libelle2, $montant);
            var_dump($id, $idVisiteur, $unMois, $date, $libelle, $montant, $libelle2);
            $idFrais = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            $MoisSuivant = getMoisSuivant($unMois);
            var_dump($MoisSuivant);
            $pdo->creeNouvellesLignesFrais($idVisiteur, $MoisSuivant);

            $pdo->creeNouveauFraisHorsForfait($idVisiteur, $MoisSuivant, $libelle, $date, $montant);

            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $unMois);
            include 'vues/v_valider.php';
        }
        break;
            
}