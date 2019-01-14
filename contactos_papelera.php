<div style="margin:1em;">
    <?= form_open('Base/seleccion_multiple_papelera') ?>
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/papelera_contactos')?>">Papelera</a>
                </td>
                <td align="center">
                    <label for="">Seleccionados: </label>
                    <?= form_input(array('type' => 'submit', 
                                         'id' => 'restaurar', 
                                         'name' => 'restaurar', 
                                         'value' => 'restaurar',
                                         'disabled' => 'true')) ?>
                    <?= form_input(array('type' => 'submit', 
                                         'id' => 'borrar', 
                                         'name' => 'borrar',
                                         'value' => 'borrar', 
                                         'disabled' => 'true')) ?>
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
                <th><?= form_input(array('type' => 'checkbox', 'onclick' => 'checkear_todos(this)')) ?></th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th></th>
                <!--<th></th>-->
            </tr>
        </thead>
        <tbody>
        <?php if ($rows != false) { ?>
            <?php foreach ($rows as $row) { ?>
            <tr>
                <td align="center"><?= form_input(array('type' => 'checkbox', 'onchange' => 'verificar(this)', 'name' => 'cbox[]', 'class' => 'cb', 'value' => $row->id_contacto)) ?></td>
                <td><?= $row->nombre ?> <?= $row->apellido ?></td>
                <td><?= $row->correo ?></td>
                <td><?= $row->telefono ?></td>
                <td align="center">
                    <a href="#" onclick="nota('<?=$row->direccion?>','<?="https://www.facebook.com/".$row->facebook?>', '<?= $row->notas?>','<?= $row->compartir?>')">Ver mas</a>
                </td>
                <!--
                <td align="center">
                    <table>
                        <tr>
                            <td><a href="<?=site_url('Base/editar_contactos/'.$row->id_contacto)?>">Editar</a></td>
                            <td><a href="<?=site_url('Base/borrar_contactos/'.$row->id_contacto)?>">Borrar</a></td>
                        </tr>
                    </table>
                </td>
                -->
            </tr>
            <?php } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="7">No hay contactos para mostrar</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <?= form_close() ?>
</div>

<div class="black-display" id="bloque">
    <div class="white-square">
        <div style="text-align:right;margin-bottom:1em"><a href="#" onclick="cerrar_nota()">Cerrar Ventana</a></div>
        <table border="1" class="table-notes" width="100%" style="margin-bottom:1em">
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
                <tr>
                    <td>Compartido</td>
                    <td><p id="texto-share"></p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
function checkear_todos(el)
{
    if (el.checked)
    {
        arr = document.getElementsByClassName("cb");
        for(index in arr)
        {
            arr[index].checked = true;
        }
        restaurar.disabled= false;
        borrar.disabled= false;
    }else
    {
        arr = document.getElementsByClassName("cb");
        for(index in arr)
        {
            arr[index].checked = false;
        }
        restaurar.disabled= true;
        borrar.disabled= true;
    }
}
function verificar(el)
{
    restaurar = document.getElementById("restaurar");
    borrar = document.getElementById("borrar");
    if (el.checked)
    {
        restaurar.disabled= false;
        borrar.disabled= false;
    }else 
    {
        com = [];
        arr = document.getElementsByClassName("cb");
        for(index in arr) 
        {
            if (! arr[index].checked) com.push(false);
            else com.push(true);
        }
        i = 0;
        for(index in com) 
        {
            if (com[index] == false) i++;
        }
        if (i == com.length) {
            restaurar.disabled= true;
            borrar.disabled= true;
        }else
        {
            restaurar.disabled= false;
            borrar.disabled= false;
        }
    }
}
function nota(address, face, note, share)
{
    if ( address == '' ) { address = '.'; }
    if ( face == '' ) { face = '.'; }
    if ( note == '' ) { note = '.'; }
    if ( share == 0 ) { share = 'NO'; } else { share = 'SI'; }
    document.getElementById('bloque').style.display="block";
    document.getElementById('texto-direccion').innerHTML = address;
    document.getElementById('texto-face').innerHTML = 
        '<a href="'+face+'">'+face+'</a>';
    document.getElementById('texto-nota').innerHTML = note;
    document.getElementById('texto-share').innerHTML = share;
}
function cerrar_nota()
{
    document.getElementById('bloque').style.display="none";
}
</script>