<div style="margin:1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/compartir_contactos')?>">Compartidos</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/crear_contactos')?>">Crear nuevo contacto</a> |
                    <a href="<?=site_url('Base/lista_contactos')?>">Lista de Contactos</a>
                </td>
            </tr>
        </table>
    </div>
    <table border="0" width="100%" class="tabla-contactos">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if ($rows != false) { ?>
            <?php foreach($rows as $row) { ?>
                <tr>
                    <td><?= $row->nombre ?> <?= $row->apellido ?></td>
                    <td><?= $row->correo ?></td>
                    <td><?= $row->telefono ?></td>
                    <td align="center">
                        <!--<a href="#" onclick="nota('<?= $row->nombre ?> <?= $row->apellido ?>','<?= $row->notas?>')">Ver mas</a>-->
                        <a href="#" onclick="nota('<?=$row->direccion?>','<?="https://www.facebook.com/".$row->facebook?>', '<?= $row->notas?>')">Ver mas</a>
                    </td>
                </tr>
            <?php } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="4">No hay contactos compartidos</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<!--
<div class="black-display" id="bloque">
    <div class="white-square">
        <div style="text-align:right"><a href="#" onclick="cerrar_nota()">Cerrar Ventana</a></div>
        <p id="texto-nota" style="text-align:justify"></p>
    </div>
</div>
-->
<div class="black-display" id="bloque">
    <div class="white-square">
        <div style="text-align:right;margin-bottom:1em"><a href="#" onclick="cerrar_nota()">Cerrar Ventana</a></div>
        <table border="0" class="table-notes" width="100%" style="margin-bottom:1em">
            <tbody>
                <tr>
                    <td>Direccion</td>
                    <td><p id="texto-direccion"></p></td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><p id="texto-face"></p></td>
                </tr>
                <tr>
                    <td>Notas</td>
                    <td><p id="texto-nota" style="text-align:justify"></p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
/*function nota(name, note)
{
    document.getElementById('bloque').style.display="block";
    document.getElementById('texto-nota').innerHTML = note;
}
*/
function nota(address, face, note)
{
    if ( address == '' ) { address = '.'; }
    if ( face == '' ) { face = '.'; }
    if ( note == '' ) { note = '.'; }
    document.getElementById('bloque').style.display="block";
    document.getElementById('texto-direccion').innerHTML = address;
    document.getElementById('texto-face').innerHTML = 
        '<a href="'+face+'">'+face+'</a>';
    document.getElementById('texto-nota').innerHTML = note;
}
function cerrar_nota()
{
    document.getElementById('bloque').style.display="none";
}
</script>