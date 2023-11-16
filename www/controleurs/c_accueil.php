<?php
/**
 * Gestion de l'accueil
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
$estConnecteC = estConnecteC();
$estConnecteV = estConnecteV();
if ($estConnecteV) {
    include 'vues/v_accueil.php';
} elseif ($estConnecteC){
    include 'vues/v_accueilC.php'; 
} else {
    include 'vues/v_connexion.php';
}
