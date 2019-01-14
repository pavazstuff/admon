<div style="margin:1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
            <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/papelera_notas')?>">Papelera</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/crear_nota')?>">Crear nueva nota</a> | 
                    <a href="<?=site_url('Base/notas')?>">Lista de notas</a>
                </td>
            </tr>
        </table>
    </div>
    <table border="0" width="100%" class="tabla-contactos">
        <thead>
            <tr>
                <th>FECHA</th>
                <th>TITULO</th>
                <th>CONTENIDO</th>
                <th>ETIQUETA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if ($rows != false) { ?>
            <?php foreach($rows as $row) { ?>
                <tr>
                    <td><?= $row->fecha.' . '.$row->hora?></td>
                    <td><?= $row->titulo ?></td>
                    <td><?= $row->cuerpo ?></td>
                    <td><?= $row->etiqueta ?></td>
                    <td>
                        <a href="<?=site_url('Base/restaurar_nota_pap/'.$row->id_nota )?>">Restaurar</a> | 
                        <a href="<?=site_url('Base/borrar_nota_pap/'.$row->id_nota )?>">Borrar</a>
                    </td>
                </tr>
            <?php } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="5">No hay contactos para mostrar</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>