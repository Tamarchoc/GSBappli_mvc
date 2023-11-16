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


switch ($action) {
    
case 'validerFrais':
        $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        // var_dump($visiteurs_a_valider);
        $mois_a_selectionner =getMoisASelectionner();
        // var_dump($mois_a_selectionner);
        include 'vues/v_validerficheFrais.php';
        
        break; 
case 'valider' :
 $action = filter_input(INPUT_GET, 'lstMois', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'valider';
}
     $visiteurs_a_valider = $pdo->getLesVisiteursAValider();
        // var_dump($visiteurs_a_valider);
        $mois_a_selectionner =getMoisASelectionner();
        // var_dump($mois_a_selectionner);
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
include 'vues/v_valider.php';
      break; 
   
} 