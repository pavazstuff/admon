<div style="margin: 1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="<?=site_url('Base/crear_contactos')?>">Crear Contactos</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/lista_contactos')?>">Lista de Contactos</a> | 
                    <a href="<?=site_url('Base/compartir_contactos')?>">Compartidos</a>
                </td>
            </tr>
        </table>
    </div>
    <!--
    <form action="" method="POST">
        <table border="0" width="50%" style="margin-bottom: 1em;">
            <tr>
                <td align="right"><label for="firstname">Nombre</label></td>
                <td><input type="text" name="firstname" id="firstname" autofocus></td>
            </tr>
            <tr>
                <td align="right"><label for="lastname">Apellido</label></td>
                <td><input type="text" name="lastname" id="lastname"></td>
            </tr>
            <tr>
                <td align="right"><label for="mail">Correo</label></td>
                <td><input type="text" name="mail" id="mail"></td>
            </tr>
            <tr>
                <td align="right"><label for="telephone">Telefono</label></td>
                <td><input type="text" name="telephone" id="telephone"></td>
            </tr>
            <tr>
                <td align="right"><label for="address">Direccion</label></td>
                <td><input type="text" name="address" id="address"></td>
            </tr>
            <tr>
                <td align="right"><label for="facebook">Facebook</label></td>
                <td><input type="text" name="facebook" id="facebook"></td>
            </tr>
            <tr>
                <td align="right"><label for="notes">Notas</label></td>
                <td><textarea name="notes" id="notes" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Compartir</td>
                <td>
                    <input type="radio" name="share" value="0" checked> No
                    <input type="radio" name="share" value="1"> Si
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="tight"><input type="submit" value="Crear contacto"></td>
            </tr>
        </table>
    </form>
    -->
    <?= form_open('Base/crear_contactos_post') ?>
        <?php
            $nombre = Array(
                'type' => 'text',
                'name' => 'firstname', 
                'id' => 'firstname',
                'autofocus' => 'true'
            );
            $apellido = Array(
                'type' => 'text',
                'name' => 'lastname',
                'id' => 'lastname'
            );
            $correo = Array(
                'type' => 'text',
                'name' => 'mail',
                'id' => 'mail'
            );
            $telefono = Array(
                'type' => 'text',
                'name' => 'telephone',
                'id' => 'telephone'
            );
            $direccion = Array(
                'type' => 'text',
                'name' => 'address',
                'id' => 'address'
            );
            $facebook = Array(
                'type' => 'text',
                'name' => 'facebook',
                'id' => 'facebook'
            );
            $notas = Array(
                'name' => 'notes',
                'id' => 'notes',
                'cols' => '30',
                'rows' => '10'
            );
            $compartir_no = Array(
                'type' => 'radio',
                'name' => 'share',
                'value' => '0',
                'checked' => 'true'
            );
            $compartir_si = Array(
                'type' => 'radio',
                'name' => 'share',
                'value' => '1'
            );
            $crear = Array(
                'type' => 'submit',
                'value' => 'Crear Contacto'
            );
        ?>
        <table border="0" width="50%" style="margin-bottom: 1em;">
            <tr>
                <td align="right" width="35%"><?= form_label('Nombre', 'firstname') ?></td>
                <td><?= form_input($nombre);?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Apellido', 'lastname') ?></td>
                <td><?= form_input($apellido) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Correo', 'mail') ?></td>
                <td><?= form_input($correo) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Telefono', 'telephone') ?></td>
                <td><?= form_input($telefono) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Direccion', 'address') ?></td>
                <td><?= form_input($direccion) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Facebook', 'facebook') ?></td>
                <td><?= form_input($facebook) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Notas', 'notes') ?></td>
                <td><?= form_textarea($notas) ?></td>
            </tr>
            <tr>
                <td align="right"><?= form_label('Compartir', '') ?></td>
                <td>
                    <div><?= form_input($compartir_no) ?> No<?= form_input($compartir_si) ?> Si</div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?= form_input($crear) ?></td>
            </tr>
        </table>
    <?= form_close(); ?>
</div>
