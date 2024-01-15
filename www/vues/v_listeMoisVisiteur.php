<?php
/**
 * Vue Liste des mois
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
?>
        <form action="index.php?uc=validerFrais&action=valider" 
              method="post" role="form"> <!-- Liste deroulante de selection de visiteurs-->
<h2>Valider une fiche de frais </h2>
<div class="row">

    <div class="col-md-4">

            
            
                <h3>Sélectionner un visiteur : </h3>
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n">Visiteur : </label>
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($visiteurs_a_valider  as $unVisiteur) {
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        $idVisiteur = $unVisiteur['id'];
                            ?>
                            <option value="<?php echo $idVisiteur ?>">
                                <?php echo $nom." ".$prenom?> </option>
                            <?php
                    }
                    ?>    

                </select>
            </div>  

                </select>
    </div>
      
    <div class="col-md-4">
        <h3>Sélectionner un mois : </h3>
    
       
            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($mois_a_selectionner as $unMois) {
                        if ($mois == $mois_a_selectionner) {
                            ?>
                            <option selected value="<?php echo $unMois ?>">
                                <?php echo $unMois ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $unMois ?>">
                                <?php echo $unMois ?> </option>
                            <?php
                        }
                        
                        
                    }
                    ?>    
                      
         
                </select>
                
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
            <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
                   role="button">
    </div>
    </div>
          </form>