<div class="container py-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Informations de paiement</h1>
            <p class="lead">Veuillez fournir les détails nécessaires pour effectuer le paiement.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="<?php echo $serveurOK; ?>" target="iframePayment">
                <input type="hidden" name="PBX_SITE" value="<?php echo $pbx_site; ?>">
                <input type="hidden" name="PBX_RANG" value="<?php echo $pbx_rang; ?>">
                <input type="hidden" name="PBX_IDENTIFIANT" value="<?php echo $pbx_identifiant; ?>">
                <input type="hidden" name="PBX_TOTAL" value="<?php echo $pbx_total; ?>">
                <input type="hidden" name="PBX_DEVISE" value="978">
                <input type="hidden" name="PBX_CMD" value="<?php echo $pbx_cmd; ?>">
                <input type="hidden" name="PBX_PORTEUR" value="<?php echo $pbx_porteur; ?>">
                <input type="hidden" name="PBX_REPONDRE_A" value="<?php echo $pbx_repondre_a; ?>">
                <input type="hidden" name="PBX_RETOUR" value="<?php echo $pbx_retour; ?>">
                <input type="hidden" name="PBX_EFFECTUE" value="<?php echo $pbx_effectue; ?>">
                <input type="hidden" name="PBX_ANNULE" value="<?php echo $pbx_annule; ?>">
                <input type="hidden" name="PBX_REFUSE" value="<?php echo $pbx_refuse; ?>">
                <input type="hidden" name="PBX_HASH" value="SHA512">
                <input type="hidden" name="PBX_RUF1" value="POST">
                <input type="hidden" name="PBX_TIME" value="<?php echo $dateTime; ?>">
                <input type="hidden" name="PBX_SHOPPINGCART" value="<?php echo htmlspecialchars($pbx_shoppingcart); ?>">
                <input type="hidden" name="PBX_BILLING" value="<?php echo htmlspecialchars($pbx_billing); ?>">
                <input type="hidden" name="PBX_SOUHAITAUTHENT" value="<?php echo $pbx_souhaitauthent; ?>">
                <input type="hidden" name="PBX_HMAC" value="<?php echo $hmac; ?>">
                <button type="submit" class="button-add-cart btn btn-primary">Payer par carte bancaire</button>
            </form>
        </div>
        <div class="col-md-6">
            <h4>Instructions de paiement :</h4>
            <ul>
                <li>Montant total : <?php echo number_format($pbx_total/100, 2, ',', ' '); ?> EUR</li>
                <li>Commande : <?php echo $pbx_cmd; ?></li>
                <li>Porteur de la carte : <?php echo $pbx_porteur; ?></li>
                <li>Date et heure : <?php echo date('d/m/Y H:i:s', strtotime($dateTime)); ?></li>
            </ul>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <h2>Payez ici :</h2>
            <iframe name="iframePayment" title="iframe payment page" width="450" height="500" style="border: 1px solid"></iframe>
        </div>
    </div>
</div>