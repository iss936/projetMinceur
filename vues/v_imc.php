<div id="main_container">

    <h1>Votre IMC est de : <?php echo $imc ?></h1>
    <p><small>Pour rappel: votre poids est <?php echo $poids ?>kg et votre taille est <?php echo $taille ?>cm.</small></p>
    <br />
    <p>L'indice de masse corporelle (IMC) permet d'�valuer la corpulence d'une personne.</p>
	<p>L'Organisation Mondiale de la Sant� (OMS) a d�fini cet Indice de Masse Corporelle comme le standard pour �valuer les risques li�s au surpoids.
    <br />
    <h2>Tableau de correspondance IMC / Poids :</h2>
    <table class="imc_table">
		<tr>
			<th>IMC</th>
            <th>Interpr�tation</th>
            <th>Quel serait votre poids ?</th>
        </tr>
        <tr <?php if($imc < 15) echo "style='color:#c12bf3;'" ?>>
			<td>moins de 15</td>
            <td>d�nutrition</td>
            <td>En dessous de <?php echo 15*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 15 && $imc < 18.5) echo "style='color:#c12bf3;'" ?>>
            <td>15 � 18,5</td>
            <td>maigreur</td>
            <td>Entre <?php echo 15*(($taille/100)*($taille/100)) ?>kg et <?php echo 18.5*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 18.5 && $imc < 25) echo "style='color:#c12bf3;'" ?> >
            <td>18,5 � 25</td>
            <td>corpulence normale</td>
            <td>Entre <?php echo 18.5*(($taille/100)*($taille/100)) ?>kg et <?php echo 25*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 25 && $imc < 30) echo "style='color:#c12bf3;'" ?>>
            <td>25 � 30</td>
            <td>surpoids</td>
            <td>Entre <?php echo 25*(($taille/100)*($taille/100)) ?>kg et <?php echo 30*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 30 && $imc < 35) echo "style='color:#c12bf3;'" ?>>
            <td>30 � 35</td>
            <td>ob�sit� mod�r�e</td>
            <td>Entre <?php echo 30*(($taille/100)*($taille/100)) ?>kg et <?php echo 35*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 35 && $imc < 40) echo "style='color:#c12bf3;'" ?>>
            <td>35 � 40</td>
            <td>ob�sit� s�v�re</td>
            <td>Entre <?php echo 35*(($taille/100)*($taille/100)) ?>kg et <?php echo 40*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
        <tr <?php if($imc >= 40) echo "style='color:#c12bf3;'" ?>>
            <td>plus de 40</td>
            <td>ob�sit� morbide ou massive</td>
            <td>Au-dessus de <?php echo 40*(($taille/100)*($taille/100)) ?>kg</td>
        </tr>
    </table>
</div>