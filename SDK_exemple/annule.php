<?php
function annule()
{
    $montant = $_GET['Mt'];
    $ref_com = $_GET['Ref'];
    $auto = $_GET['Auto'];
    $erreur = $_GET['Erreur'];
    print ("<center><b><h2>Votre transaction a &eacute;t&eacute; annul&eacute;e</h2></center></b><br>");
    print ("<br><b>MONTANT : </b>$montant\n");
    print ("<br><b>REFERENCE : </b>$ref_com\n");
    print ("<br><b>AUTO : </b>$Auto\n");
    print ("<br><b>code retour : </b>$erreur\n");
    //mise à jour du statut
    //mysql_query("UPDATE commande SET statut='annule' WHERE ref_com='$ref_com'");
}
?>