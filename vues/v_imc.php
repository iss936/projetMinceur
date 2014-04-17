<div id="main_container">

    <h1>Votre IMC est de : <?php echo $imc ?></h1>
    <p><small>Pour rappel: votre poids est <?php echo $poids ?>kg et votre taille est <?php echo $taille ?>cm.</small></p>
    <br />
    <p>L'indice de masse corporelle (IMC) permet d'&eacute;valuer la mati&egrave;re grasse d'une personne, de d&eacute;terminer sa corpulence.</p>
    <br />
    <h2>Tableau de correspondance IMC / Poids :</h2>
    <table class="imc_table">
		<tr>
			<th>IMC</th>
            <th>Interpr&eacute;tation</th>
            <th>Quel serait votre poids ?</th>
        </tr>
        <tr <?php if($imc < 15) echo "style='color:#c12bf3;'" ?>>
			<td>moins de 15</td>
            <td>d&eacute;nutrition</td>
            <td>En dessous de 41kg</td>
        </tr>
        <tr <?php if($imc >= 15 && $imc < 18.5) echo "style='color:#c12bf3;'" ?>>
            <td>15 &agrave; 18,5</td>
            <td>maigreur</td>
            <td>Entre 41kg et 50kg</td>
        </tr>
        <tr <?php if($imc >= 18.5 && $imc < 25) echo "style='color:#c12bf3;'" ?> >
            <td>18,5 &agrave; 25</td>
            <td>corpulence normale</td>
            <td>Entre 50kg et 68kg</td>
        </tr>
        <tr <?php if($imc >= 25 && $imc < 30) echo "style='color:#c12bf3;'" ?>>
            <td>25 &agrave; 30</td>
            <td>surpoids</td>
            <td>Entre 68kg et 82kg</td>
        </tr>
        <tr <?php if($imc >= 30 && $imc < 35) echo "style='color:#c12bf3;'" ?>>
            <td>30 &agrave; 35</td>
            <td>ob&eacute;sit&eacute; mod&eacute;r&eacute;e</td>
            <td>Entre 82kg et 95kg</td>
        </tr>
        <tr <?php if($imc >= 35 && $imc < 40) echo "style='color:#c12bf3;'" ?>>
            <td>35 &agrave; 40</td>
            <td>ob&eacute;sit&eacute; s&eacute;v&egrave;re</td>
            <td>Entre 95kg et 109kg</td>
        </tr>
        <tr <?php if($imc >= 40) echo "style='color:#c12bf3;'" ?>>
            <td>plus de 40</td>
            <td>ob&eacute;sit&eacute; morbide ou massive</td>
            <td>Au-dessus de 109kg</td>
        </tr>
    </table>
</div>