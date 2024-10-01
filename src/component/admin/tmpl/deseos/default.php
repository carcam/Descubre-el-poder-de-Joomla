<?php

use Joomla\CMS\Router\Route;

\defined('_JEXEC') or die;

?>
<?php if ($this->items) :?>
<form action="<?php echo Route::_('index.php?option=com_aiwfc&view=deseos'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="table-responsive">
        <table class="table table-striped">
            <caption>Lista de deseos</caption>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Deseo</td>
                    <td>Creado</td>
                </tr>
            </thead>
            <tfoot>
                <?php echo $this->pagination->getListFooter(); ?>
            </tfoot>
            <tbody>
                <?php foreach ($this->items as $item) :?>
                <tr>
                    <td><?php echo $item->id;?></td>
                    <td>
                        <div class="item-title">
                            <a href="<?php echo Route::_('index.php?option=com_aiwfc&view=deseo&task=edit&id=' . (int) $item->id); ?>">
                                <?php echo $item->titulo;?>
                            </a>
                        </div>
                        <p class="item-description"><?php echo $item->descripcion;?></p>
                    </td>
                    <td><?php echo $item->creado;?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <input type="hidden" name="task" value="">
</form>
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