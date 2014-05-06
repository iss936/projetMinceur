<div id="main_container">

    <h1>Votre IMC est de : <?php echo $imc ?></h1>
    <p><small>Pour rappel: votre poids est <?php echo $poids ?>kg et votre taille est <?php echo $taille ?>cm.</small></p>
    <br />
    <p>L'indice de masse corporelle (IMC) permet d'évaluer la corpulence d'une personne.</p>
	<p>L'Organisation Mondiale de la Santé (OMS) a défini cet Indice de Masse Corporelle comme le standard pour évaluer les risques liés au surpoids.
    <br />
    <h2>Tableau de correspondance IMC / Poids :</h2>
    <table class="imc_table">
		<tr>
			<th>IMC</th>
            <th>Interprétation</th>
            <th>Quel serait votre poids ?</th>
        </tr>
        <tr <?php if($imc < 15) echo "style='color:#c12bf3;'" ?>>
			<td>moins de 15</td>
            <td>dénutrition</td>
            <td>En dessous de <?php echo 15*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 15 && $imc < 18.5) echo "style='color:#c12bf3;'" ?>>
            <td>15 à 18,5</td>
            <td>maigreur</td>
            <td>Entre <?php echo 15*(($taille/100)*($taille/100)) ?>kg et <?php echo 18.5*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 18.5 && $imc < 25) echo "style='color:#c12bf3;'" ?> >
            <td>18,5 à 25</td>
            <td>corpulence normale</td>
            <td>Entre <?php echo 18.5*(($taille/100)*($taille/100)) ?>kg et <?php echo 25*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 25 && $imc < 30) echo "style='color:#c12bf3;'" ?>>
            <td>25 à 30</td>
            <td>surpoids</td>
            <td>Entre <?php echo 25*(($taille/100)*($taille/100)) ?>kg et <?php echo 30*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 30 && $imc < 35) echo "style='color:#c12bf3;'" ?>>
            <td>30 à 35</td>
            <td>obésité modérée</td>
            <td>Entre <?php echo 30*(($taille/100)*($taille/100)) ?>kg et <?php echo 35*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 35 && $imc < 40) echo "style='color:#c12bf3;'" ?>>
            <td>35 à 40</td>
            <td>obésité sévère</td>
            <td>Entre <?php echo 35*(($taille/100)*($taille/100)) ?>kg et <?php echo 40*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 40) echo "style='color:#c12bf3;'" ?>>
            <td>plus de 40</td>
            <td>obésité morbide ou massive</td>
            <td>Au-dessus de <?php echo 40*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
    </table>
</div>