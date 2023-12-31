<?php
/**
 * Vue Liste des frais au forfait
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
<div class="row">

    <div class="col-md-4">

            
            
              
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n">Choisir le Visiteur : </label>
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
          
    </div>
    </div>
          </form>
               <h2 style = "color: orange">Valider la fiche de frais </h2>
<div class="row">    
   
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=validerFrais&action=valider" 
              role="form">
            <fieldset>       
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite']; ?>
                    <div class="form-group">
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </div>
                    <?php
                }
                ?>
                <button class="btn btn-success" type="submit">Corriger</button>
                <button class="btn btn-danger" type="reset">Réinitialiser</button>
            </fieldset>
        </form>
    </div>
</div>
