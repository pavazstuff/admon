<div style="margin:1em;">
    <?= form_open('Base/seleccion_multiple') ?>
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/lista_contactos')?>">Lista de Contactos</a>
                </td>
                <td align="center">
                    <label for="">Seleccionados: </label>
                    <?= form_input(array('type' => 'submit', 
                                         'id' => 'no_compartir', 
                                         'name' => 'no_compartir', 
                                         'value' => 'No Compartir',
                                         'disabled' => 'true')) ?>
                    <?= form_input(array('type' => 'submit', 
                                         'id' => 'compartir', 
                                         'name' => 'compartir', 
                                         'value' => 'compartir',
                                         'disabled' => 'true')) ?>
                    <?= form_input(array('type' => 'submit', 
                                         'id' => 'borrar', 
                                         'name' => 'borrar',
                                         'value' => 'borrar', 
                                         'disabled' => 'true')) ?>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/papelera_contactos')?>">Papelera</a> | 
                    <a href="<?=site_url('Base/crear_contactos')?>">Crear nuevo contacto</a> |
                    <a href="<?=site_url('Base/compartir_contactos')?>">Compartidos</a>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin-bottom:1em">
        <div class="orderby">
            <strong style="margin-right:1em">Ordenar por: </strong>
            <span style="margin-right:1em">NOMBRE
            <a href="<?=site_url('Base/lista_contactos?column=nombre&order=asc')?>">&#9650;</a> 
            <a href="<?=site_url('Base/lista_contactos?column=nombre&order=desc')?>">&#9660;</a>
            </span>
            <span style="margin-right:1em">APELLIDO
            <a href="<?=site_url('Base/lista_contactos?column=apellido&order=asc')?>">&#9650;</a> 
            <a href="<?=site_url('Base/lista_contactos?column=apellido&order=desc')?>">&#9660;</a>
            </span>
            <span style="margin-right:1em">CORREO
            <a href="<?=site_url('Base/lista_contactos?column=correo&order=asc')?>">&#9650;</a> 
            <a href="<?=site_url('Base/lista_contactos?column=correo&order=desc')?>">&#9660;</a>
            </span>
            <span style="margin-right:1em">TELEFONO
            <a href="<?=site_url('Base/lista_contactos?column=telefono&order=asc')?>">&#9650;</a> 
            <a href="<?=site_url('Base/lista_contactos?column=telefono&order=desc')?>">&#9660;</a>
            </span>
            <span style="margin-right:1em">
            <?php if ($rows != false) { ?>
            <?= form_input(array('type' => 'button', 'value' => 'Imprimir', 'onclick' => 'imprimir()')) ?>
            <?php } ?>
            </span>
        </div>
    </div>
    <table border="0" width="100%" class="tabla-contactos">
        <thead>
            <tr>
                <th><?= form_input(array('type' => 'checkbox', 'onclick' => 'checkear_todos(this)')) ?></th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if ($rows != false) { ?>
            <?php foreach ($rows as $row) { ?>
            <tr>
                <!--
                    <td><input type="checkbox" onchange="verificar(this)" name="cbox[]" class="cb" value="<?= $row->id_contacto ?>"></td>
                -->
                <td align="center"><?= form_input(array('type' => 'checkbox', 'onchange' => 'verificar(this)', 'name' => 'cbox[]', 'class' => 'cb', 'value' => $row->id_contacto)) ?></td>
                <td><?= $row->nombre ?> <?= $row->apellido ?></td>
                <td><?= $row->correo ?></td>
                <td><?= $row->telefono ?></td>
                <td align="center">
                    <a href="#" onclick="nota('<?=$row->direccion?>','<?="https://www.facebook.com/".$row->facebook?>', '<?= $row->notas?>','<?= $row->compartir?>')">Ver mas</a>
                </td>
                <td align="center">
                    <!--
                    <div><a href="">Editar</a></div>
                    <div><a href="<?=site_url('Base/borrar_contactos/'.$row->id_contacto)?>">Borrar</a></div>
                    -->
                    <table>
                        <tr>
                            <td><a href="<?=site_url('Base/editar_contactos/'.$row->id_contacto)?>">Editar</a></td>
                            <td><a href="<?=site_url('Base/borrar_contactos/'.$row->id_contacto)?>">Borrar</a></td>
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
    <?= form_close() ?>
</div>

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
                <tr>
                    <td>Compartido</td>
                    <td><p id="texto-share"></p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="content" style="display:none">
    <table border="1" width="100%" cellpadding="8">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th>DIRECCION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?= $row->nombre ?> <?= $row->apellido ?></td>
                <td><?= $row->correo ?></td>
                <td><?= $row->telefono ?></td>
                <td><?= $row->direccion ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
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
        no_compartir.disabled= false;
        compartir.disabled= false;
        borrar.disabled= false;
    }else
    {
        arr = document.getElementsByClassName("cb");
        for(index in arr)
        {
            arr[index].checked = false;
        }
        no_compartir.disabled= true;
        compartir.disabled= true;
        borrar.disabled= true;
    }
}
function verificar(el)
{
    no_compartir = document.getElementById("no_compartir");
    compartir = document.getElementById("compartir");
    borrar = document.getElementById("borrar");
    if (el.checked)
    {
        no_compartir.disabled= false;
        compartir.disabled= false;
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
            no_compartir.disabled= true;
            compartir.disabled= true;
            borrar.disabled= true;
        }else
        {
            no_compartir.disabled= false;
            compartir.disabled= false;
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
function imprimir()
{
    ventana = window.open(' ','popup');
    ventana.document.write( document.getElementById('content').innerHTML );
    ventana.print();
    ventana.close();
}
</script>