<div style="margin:1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/papelera_agenda')?>">Papelera</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/crear_evento')?>">Crear nuevo evento</a> |
                    <a href="<?=site_url('Base/agenda')?>">Agenda</a>
                </td>
            </tr>
        </table>
    </div>
    <table border="0" width="100%" class="tabla-contactos">
        <thead>
            <tr>
                <th>EVENTOS</th>
            </tr>
        </thead>
        <tbody>

        <?php 
            function mes($id){
                return array('ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC')[$id-1];
            }
            $fecha_pasada = "";
        ?>

        <?php if ( $rows != false ) { ?>
            <?php foreach ( $rows as $row ) { ?>

            <?php 
                $f_dividida = explode('-', $row->fecha_inicio);
                $f_dividida_v = explode('-', $row->fecha_inicio);

                if ( $fecha_pasada != $f_dividida[0] ) 
                { 
            ?>
            <tr class="year">
                <th><?= $f_dividida[0] ?></th>
            </tr>
            <?php
                } 
                $fecha_pasada = $f_dividida[0]; 
            ?>
            <tr>
                <td>
                    <table border="0" width="100%">
                        <tr>
                            <td width="10%">
                                <strong><?= $f_dividida[2] ?> <?= mes($f_dividida[1]) ?></strong>
                            </td>
                            <td width="20%">
                                Vigencia: <?= $f_dividida_v[2] ?> <?= mes($f_dividida_v[1]) ?> <?= $f_dividida_v[0] ?>
                            </td>
                            <td width="">
                                Hora de inicio: <?= $row->hora_inicio ?> - Hora de vigencia: <?= $row->hora_vigencia ?>                                
                            </td>
                            <td align="right">
                                <a href="<?= site_url('Base/restaurar_evento_pap/'.$row->id_evento)?>">Restaurar</a> | 
                                <a href="<?= site_url('Base/borrar_evento_pap/'.$row->id_evento) ?>">Borrar</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2" class="evento-agenda"><?= $row->evento ?>, <span style="color:#555;"><?= $row->etiqueta ?></span></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="7">No hay contactos para mostrar</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>