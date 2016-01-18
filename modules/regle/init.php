<?php
if (isset($_GET["action"])) {
    if ($_GET["action"] == "pdf") {
        require('./include/fpdf/fpdf.php');

        class PDF extends FPDF {

            function Footer() {
                // Positionnement à 1,5 cm du bas
                $this->SetY(-15);
                // Arial italique 8
                $this->SetFont('Arial', 'I', 8);
                // Couleur du texte en gris
                $this->SetTextColor(128);
                // Numéro de page
                $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' - http://nbastore.eu', 0, 0, 'C');
            }

            function TitreChapitre($num, $libelle) {
                // Arial 12
                $this->SetFont('Arial', '', 12);
                // Couleur de fond
                $this->SetFillColor(200, 220, 255);
                // Saut de ligne
                $this->Ln(4);
            }

            function CorpsChapitre($fichier) {
                // Lecture du fichier texte
                $txt = file_get_contents($fichier);
                // Times 12
                $this->SetFont('Times', '', 12);
                // Sortie du texte justifié
                $this->MultiCell(0, 5, $txt);
                // Saut de ligne
                $this->Ln();
            }

            function AjouterChapitre($num, $titre, $fichier) {
                $this->AddPage();
                $this->TitreChapitre($num, $titre);
                $this->CorpsChapitre($fichier);
            }

        }

        ob_clean();
        $pdf = new PDF();
        $pdf->SetAuthor('NBAStore EU');
        $pdf->AjouterChapitre(1, 'Conditions generales', 'regle.txt');
        $pdf->Output();
    }
}
?>

<div class="row" id="container">
    <div class="medium-12" style="padding:10px;">
        <h2 class="text-center">Conditions générales d'utilisation<br />du NBAStore EU</h2><br />
        Bienvenue à ce concours sur La boutique en ligne de la NBA. En utilisant ce site, l´utilisateur (« utilisateur » ou « vous ») accepte les conditions d´utilisation suivantes et les conditions générales d´utilisation de La boutique en ligne de la NBA. Si vous n´acceptez pas ces conditions d´utilisation, veuillez quitter ce site web. La boutique en ligne de la NBA est un site web officiel de la NBA exploité sous licence par Kitbag Limited (« Kitbag »). Kitbag se réserve le droit de modifier le contenu de ce site web à tout moment sans préavis. Votre utilisation continue de ce site implique que vous acceptez les termes de toute version mise à jour de ce site. Nous vous conseillons d´ouvrir ce règlement dans une autre fenêtre de navigateur pour que vous puissiez l´imprimer.<br /><br />
        <h4>Détails du concours</h4><br />
Il n´y a actuellement aucun concours en cours sur le site La boutique en ligne de la NBA. Revenez nous voir bientôt pour encore plus de concours passionnants et « la Boutique ») est la boutique en ligne officielle du la NBA et est exploité par Kitbag Limited (« Kitbag », « nous », « notre » ou « nos »). Kitbag est une société constituée en Angleterre et au Pays de Galles sous le numéro de société 5933624 dont le siège social se situe au 2 Gregory Street, Hyde, Cheshire SK14 4TH. Le numéro d´identification TVA de Kitbag est le suivant : 125688644.<br />
<br />


        <h4>1. Inscription</h4><br />
Vous devez vous inscrire sur le site de Kitbag pour passer une commande de produits dans la Boutique.
Pour utiliser ce Site et bénéficier de nos services, vous confirmez que toutes les informations que vous nous fournissez sur vous-même à tout moment sont véridiques, exactes, actuelles et complètes et que vous ferez en sorte que de maintenir ces informations exactes et à jour. Si des informations incorrectes sont fournies, toute obligation contractuelle de Kitbag deviendra immédiatement nulle et non avenue..<br /><br />


        <h4>2. Conditions d´inscription</h4><br />
Si vous avez moins de 18 ans, vous devez demander l´autorisation de votre parent ou tuteur avant d´: <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- envoyer un email au site internet ou de nous demander de vous contacter par email ; <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- participer à un concours ; <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- essayer d´acheter quoi que ce soit à la Boutique.<br />
En continuant d´utiliser ce Site et tous les services offerts, vous confirmez que vous avez reçu le consentement de votre parent ou d´un tuteur. Avant de s´inscrire, nous recommandons à tous les mineurs de discuter des conditions générales avec leurs parents.<br /><br />


        <h4>3. Propriété des ressources</h4><br />
Tout le contenu inclus sur ce Site, y compris - mais sans se limiter à - la conception du site Web, les textes, graphiques, clips audio, clips visuels, logos, icônes de bouton ainsi que la sélection et l´arrangement de ces derniers est détenu par Kitbag ou sous licence Kitbag et est protégé par les droits d ´auteur, la marque déposée et autres droits et lois de propriété intellectuelle partout dans le monde. Vous êtes autorisé à afficher les ressources disponibles sur ce Site sur un écran d'ordinateur et de télécharger et imprimer une copie papier pour votre usage personnel à condition que vous ne modifiez ou ne supprimiez aucun droit d´auteur, aucune marque déposée ni aucun autre avis de propriété intellectuelle.
Vous acceptez de ne pas :<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-utiliser les ressources disponibles sur ce Site à des fins d´exploitation commerciale sans autorisation écrite préalable de Kitbag ;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-établir un lien vers ce Site à partir de tout autre site internet, intranet ou extranet sans autorisation écrite préalable de Kitbag ;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-commettre tout acte pouvant gêner ou perturber ce Site ;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-commettre tout acte pouvant porter atteinte aux droits de toute autre personne.<br />
Pour plus d´informations sur des questions relatives à la propriété intellectuelle, veuillez prendre contact avec notre service juridique : <br />
PO Box 210 <br />
Manchester <br />
England <br />
M24 1YN<br /><br />



        <h4>4. Achat de marchandises</h4><br />

La Rubrique d’aide vous explique comment commander et procéder au paiement de vos produits. Vous y trouverez également des réponses aux questions que vous pouvez avoir sur la livraison de vos produits, votre droit d´annuler les commandes ou de nous retourner les produits défectueux et notre garantie de qualité.
Kitbag se réserve le droit de refuser les commandes de volume ou de valeur très importants et de modifier les prix et les informations relatives à la disponibilité sans préavis.<br /><br />



        <h4>5. Disponibilité</h4><br />
Kitbag fait tout son possible pour garantir à tout moment le fonctionnement de ce Site. Cependant, nous ne pouvons garantir que le Site sera toujours complètement opérationnel. Par exemple, l´accès à ce Site peut être interrompu ou restreint pour permettre des réparations d´urgence ou régulières, des opérations de maintenance la mise en place de nouvelles installations ou de services.<br />
Kitbag se réserve le droit de restreindre, suspendre ou résilier votre utilisation de ce Site ou de l´un de nos services à tout moment, si nous estimons, ànotre entière discrétion, que vous avez violé ces conditions générales. <br /><br />


        <h4>6. Limitation de responsabilité</h4><br />
Kitbag ne pourra être tenu responsable de toute perte ou dommage (par contrat, négligence ou autre) lorsque :<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-il n´y a aucun manquement à une obligation légale de diligence envers vous par nous ;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-la perte ou le dommage n´est pas une conséquence raisonnablement prévisible d´un tel manquement ; <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ou toute augmentation de la perte ou du dommage résulte d´une violation par vous des présentes conditions générales.<br />
Rien dans ces conditions générales n´exclut ou limite notre responsabilité pour fraude ou pour décès ou lésions corporelles causés par notre négligence.<br /><br />
        
        <h4>7. Clause de non-responsabilité</h4><br />
Ce Site et son contenu sont fournis sans aucune déclaration ou garantie de quelque nature que ce soit, expresse ou tacite. Kitbag exclut toute déclaration et garantie, y compris et par exemple, quant à l´adéquation à un usage particulier, dans la mesure permise par les lois applicables. De plus, KItbag ne déclare ni ne garantit que les informations et/ou les services accessibles via ce Site sont exacts, complets ou actualisés, ou que ce Site sera toujours exempt de défauts, y compris et par exemple, de virus ou d´autres éléments nuisibles. L´utilisateur de ce Site assume tous les coûts résultant de l´utilisation de ce Site. Droit applicableCes conditions générales sont soumises au droit anglais et chacun de nous se soumet par les présentes à la compétence non exclusive des tribunaux anglais exception faite que Kitbag peut commencer et/ou défendre des procédures dans tout territoire afin de protéger ses droits de propriété intellectuelle ou des informations confidentielles sur ce territoire.<br /><br />

        <center><a class="button btn-send" target="_blank" href="index.php?module=regle&action=pdf">Enregister le document</a></center>
    </div>
</div>