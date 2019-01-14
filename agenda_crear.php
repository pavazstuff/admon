<div style="margin:1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/crear_evento')?>">Crear Evento</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/agenda')?>">Agenda</a> |
                    <a href="<?=site_url('Base/compartir_eventos')?>">Compartidos</a>
                </td>
            </tr>
        </table>
    </div>
    <?= form_open('Base/crear_evento_post') ?>
        <?php
            $f_inicio = array(
                'type' => 'date',
                'name' => 'date1', 
                'id' => 'date1',
                'value' => date('Y-m-d'),
                'autofocus' => 'true'
            );
            $h_inicio = array(
                'type' => 'time',
                'name' => 'time1', 
                'id' => 'time1',
                'value' => date('h:i')
            );
            $f_vigencia = array(
                'type' => 'date',
                'name' => 'date2', 
                'id' => 'date2',
                'value' => date('Y-m-d')
            );
            $h_vigencia = array(
                'type' => 'time',
                'name' => 'time2', 
                'id' => 'time2',
                'value' => date('h:i')
            );
            $evento = array(
                'name' => 'event', 
                'id' => 'event',
                'cols' => '30',
                'rows' => '10'
            );
            $etiqueta = array(
                'type' => 'text',
                'name' => 'tag', 
                'id' => 'tag'
            );
            $compartir_no = array(
                'type' => 'radio',
                'name' => 'share',
                'value' => '0',
                'checked' => 'true'
            );
            $compartir_si = array(
                'type' => 'radio',
                'name' => 'share',
                'value' => '1'                
            );
            $crear = array(
                'type' => 'submit',
                'value' => 'Crear Evento'
            );
        ?>
        <table border="0" width="50%" style="margin-bottom: 1em;">
            <tr>
                <td align="right" width="35%"><?= form_label('Fecha Inicio','date1') ?></td>
                <td><?= form_input($f_inicio) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Hora Inicio','time1') ?></td>
                <td><?= form_input($h_inicio) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Fecha Vigencia','date2') ?></td>
                <td><?= form_input($f_vigencia) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Hora Vigencia','time2') ?></td>
                <td><?= form_input($h_vigencia) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Evento','event') ?></td>
                <td><?= form_textarea($evento) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Etiqueta','tag') ?></td>
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