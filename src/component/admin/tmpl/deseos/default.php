<?php

use Joomla\CMS\Router\Route;

\defined('_JEXEC') or die;

?>
<?php if ($this->items) :?>

    Algo no va bien...

<?php else : ?>
<div class="text-large">
    <p>No tienes deseos. Recuerda que:</p>
    <blockquote cite="https://es.wikiquote.org/wiki/Deseo#cite_ref-senor135-9_2-2">
        Antes de desear ardientemente una cosa, debemos asegurarnos de la felicidad que nos dará cuando la tengamos.
        <footer>
            <a href="">François de La Rochefoucauld</a>
        </footer>
    </blockquote>
</div>
<?php endif;?>