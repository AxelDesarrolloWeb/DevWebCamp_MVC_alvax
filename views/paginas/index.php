<?php

use Model\Ponente;

include_once __DIR__ . '/conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total; ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total; ?></p>
            <p class="resumen__texto">WorkShops</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>


<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros expertos de DevWebCamp</p>

    <?php foreach ($ponentes as $ponente) { ?>
        <div class="speaker">
            <picture>
                <source srcset="img/speakers/<?php echo $ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="img/speakers/<?php echo $ponente->imagen; ?>.png" type="image/png">
                <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/speakers/<?php echo $ponente->imagen; ?>.png" alt="Imagen Ponente">
            </picture>

            <div class="speaker__informacion">
                <h4 class="speaker__nombre">
                    <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
                </h4>
                <p class="speaker__ubicacion">
                    <?php echo $ponente->ciudad . ' ' . $ponente->pais; ?>
                </p>

                <nav class="speaker__sociales">
                    <?php
                    $redes = json_decode($ponente->redes);


                    ?>

                    <?php if (!empty($redes->facebook)) { ?>

                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                            <span class="menu-redes__ocultar">Facebook</span>
                        </a>

                    <?php } ?>

                    <?php if (!empty($redes->twitter)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                            <span class="menu-redes__ocultar">Twitter</span>
                        </a>
                    <?php } ?>

                    <?php if (!empty($redes->youTube)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youTube; ?>">
                            <span class="menu-redes__ocultar">YouTube</span>
                        </a>
                    <?php } ?>

                    <?php if (!empty($redes->instagram)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                            <span class="menu-redes__ocultar">Instagram</span>
                        </a>
                    <?php } ?>

                    <?php if (!empty($redes->tiktok)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>#">
                            <span class="menu-redes__ocultar">Tiktok</span>
                        </a>
                    <?php } ?>

                    <?php if (!empty($redes->gitHub)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->gitHub; ?>#">
                            <span class="menu-redes__ocultar">GitHub</span>
                        </a>
                    <?php } ?>
                </nav>

                <ul class="speaker__listado-skills">
                    <?php $tags = explode(',', $ponente->tags);
                    foreach ($tags as $tag) { ?>
                        <li class="speaker__skill"><?php echo $tag; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</section>