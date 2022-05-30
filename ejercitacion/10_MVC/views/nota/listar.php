<h3><?= $nota->getNombre() ?></h3>
<h4><?= $nota->getContenido() ?></h4>

<h1>Listado de notas</h1>
<?php while($nota = $notas->fetch_object()) : ?>
    <?= $nota->titulo.' //' ?>
    <?= $nota->fecha ?>
    </br>
    <?= $nota->descripcion?>
    </br>
<?php endwhile ?>