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
<form action="index.php?uc=validerFrais&action=corrigerElementForfaitises" 
      method="post" role="form"> <!-- Liste deroulante de selection de visiteurs-->
    <h2>Valider une fiche de frais </h2>
    <div class="row">
        <div class="col-md-4">
            <!-- Liste déroulante de sélection de visiteurs -->
            <div class="form-group">
                <label for="lstMois" accesskey="n">Choisir le visiteur : </label>
                <select id="lstMois" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($visiteurs_a_valider as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $nom = $unVisiteur['nom'];
                        $prenom = $unVisiteur['prenom'];
                        if ($id == $visiteurASelectionner) {
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($mois_a_selectionner as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </div>

        </div>
    </div>

<div class="row">
        <h2 style = "color: orange">Valider la fiche de frais </h2>


        <h3>Eléments forfaitisés</h3>
        <div class="col-md-4">

            <fieldset>       
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite'];
                    ?>
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

        </div>
</div> </form> <br> <br> 
    

    <div class="panel panel-info-me">
    <div class="panel-heading" style="background-color:orange">Descriptif des éléments hors forfait </div>
            <table class="table table-bordered table-responsive">
                
                    <tr>
                        <th class="date">Date</th>
                        <th class="libelle">Libellé</th>
                        <th class="montant">Montant</th>     
                         <th></th>
                    </tr>
                    <?php
                    foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                        $id = $unFraisHorsForfait['id'];
                        $date = $unFraisHorsForfait['date'];
                        $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                        $montant = $unFraisHorsForfait['montant'];
                        ?>
                  
                        <tr> 
                            <form method="post" 
      action="index.php?uc=validerFrais&action=afficherCorrection" 
      role="form">
                        <input name="lstMois" type="hidden" id="lstMois" class="form-control" value="<?php echo $moisASelectionner ?>">
    <input name="lstVisiteur" type="hidden" id="lstVisiteurs" class="form-control" value="<?php echo $visiteurASelectionner ?>">
                            <td><input type="text" id="idFrais" 
                               name="date"
                               size="10" maxlength="5" 
                               value="<?php echo $date ?>"></td>
                          <td><input type="text" id="libelle" 
                               name="libelle"
                               size="10" maxlength="30"  
                               value="<?php echo $libelle ?>"></td>
                            <td><input type="text" id="montant" 
                               name="montant"
                               size="10" maxlength="5" 
                               value="<?php echo $montant ?>"></td>
                          <td><input type="hidden" id="id" 
                               name="id"
                               value="<?php echo $id?>" >
                            <input id="corrigerFHF" name="corrigerFHF" type="submit" value="Corriger" class="btn btn-success"/>  
                        <input id="supprimerFHF" name="supprimerFHF" type="submit" value="Supprimer" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"/>
                         <input id="reporterFHF" name="reporterFHF" type="submit" value="Reporter" class="btn btn-success" style="background-color:orange"/>  
                             </td>
                             
                      </form>
                  </tr>
                 
                               
                 
                        <?php

                    }
                    ?>
            </table>
            
        </div>
         
    </div><br> <br> 
  <!-- Liste déroulante de sélection de Nombre de justificatifs -->
            <div class="form-group">
                <label for="hidden" accesskey="n">Nombre de justificatifs: </label>
      </select>
    <input type="number" class="small-input" id="justificatifs" name="justificatifs" placeholder="Nombre" />
</div> 
  

 <button class="btn btn-success CV" type="submit">Valider</button>
    <button class="btn btn-danger" type="reset">Réinitialiser</button>
    
    
