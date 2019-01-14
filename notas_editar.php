<div style="margin:1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="#">Editar Nota</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/notas')?>">Lista de notas</a> |
                    <a href="<?=site_url('Base/compartir_notas')?>">Compartidos</a>
                </td>
            </tr>
        </table>
    </div>
    <?= form_open('Base/editar_nota_post') ?>
        <?php
            $fecha = array(
                'type' => 'date',
                'name' => 'date',
                'id' => 'date',
                'value' => $rows[0]->fecha,
                'autofocus' => 'true'
            );
            $hora = array(
                'type' => 'time',
                'name' => 'time',
                'id' => 'time',
                'value' => $rows[0]->hora
            );
            $titulo = array(
                'type' => 'text',
                'name' => 'title',
                'id' => 'title',
                'value' => $rows[0]->titulo
            );
            $cuerpo = array(
                'name' => 'body',
                'id' => 'body',
                'cols' => '30',
                'rows' => '10',
                'value' => $rows[0]->cuerpo
            );
            $etiqueta = array(
                'type' => 'text',
                'name' => 'tag',
                'id' => 'tag',
                'value' => $rows[0]->etiqueta
            );
            if ( $rows[0]->compartir == 0 ) 
            {
                $compartir_no = array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '0',
                                      'checked' => 'true');
                $compartir_si = array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '1');
            }else
            {
                $compartir_no = array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '0');
                $compartir_si = array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '1',
                                      'checked' => 'true');
            }
            $crear = array(
                'type' => 'submit',
                'value' => 'Editar Nota'
            );
        ?>
        <?= form_input(array('type' => 'hidden', 'name' => 'id_nota', 'value' => $rows[0]->id_nota )) ?>
        <table border="0" width="50%" style="margin-bottom: 1em;">
            <tr>
                <td align="right" width="35%"><?= form_label('Fecha', 'date') ?></td>
                <td><?= form_input($fecha) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Hora', 'time') ?></td>
                <td><?= form_input($hora) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Titulo', 'title') ?></td>
                <td><?= form_input($titulo) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Cuerpo', 'body') ?></td>
                <td><?= form_textarea($cuerpo) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Etiqueta', 'tag') ?></td>
                <td><?= form_input($etiqueta) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Compartir') ?></td>
                <td><?= form_input($compartir_no) ?> No<?= form_input($compartir_si) ?> Si</td>
            </tr>
            <tr>
                <td align="right"></td>
                <td><?= form_input($crear) ?></td>
            </tr>
        </table>
    <?= form_close() ?>
</div>