<div style="margin: 1em;">
    <div style="margin-bottom: 1em;">
        <table width="100%">
            <tr>
                <td align="left">
                    <a href="<?=site_url('Base')?>">Pagina Principal</a> >
                    <a href="#">Editar Contactos</a>
                </td>
                <td align="right">
                    <a href="<?=site_url('Base/lista_contactos')?>">Lista de Contactos</a> | 
                    <a href="<?=site_url('Base/compartir_contactos')?>">Compartidos</a>
                </td>
            </tr>
        </table>
    </div>
    <?= form_open('Base/editar_contactos_post') ?>
        <?php
            $nombre = Array('type' => 'text',
                            'name' => 'firstname', 
                            'id' => 'firstname',
                            'autofocus' => 'true',
                            'value' => $row[0]->nombre);
            $apellido = Array('type' => 'text',
                              'name' => 'lastname',
                              'id' => 'lastname',
                              'value' => $row[0]->apellido);
            $correo = Array('type' => 'text',
                            'name' => 'mail',
                            'id' => 'mail',
                            'value' => $row[0]->correo);
            $telefono = Array('type' => 'text',
                              'name' => 'telephone',
                              'id' => 'telephone',
                              'value' => $row[0]->telefono);
            $direccion = Array('type' => 'text',
                               'name' => 'address',
                               'id' => 'address',
                               'value' => $row[0]->direccion);
            $facebook = Array('type' => 'text',
                              'name' => 'facebook',
                              'id' => 'facebook',
                              'value' => $row[0]->facebook);
            $notas = Array('name' => 'notes',
                           'id' => 'notes',
                           'cols' => '30',
                           'rows' => '10',
                           'value' => $row[0]->notas);

            if ( $row[0]->compartir == 0 ) 
            {
                $compartir_no = Array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '0',
                                      'checked' => 'true');
                $compartir_si = Array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '1');
            }else
            {
                $compartir_no = Array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '0');
                $compartir_si = Array('type' => 'radio',
                                      'name' => 'share',
                                      'value' => '1',
                                      'checked' => 'true');
            }

            $crear = Array('type' => 'submit',
                           'value' => 'Editar Contacto');
        ?>
        <?= form_input(array('type' => 'hidden', 'name' => 'id_contacto', 'value' => $row[0]->id_contacto )) ?>
        <table border="0" width="50%" style="margin-bottom: 1em;">
            <tr>
                <td align="right"><?= form_label('Nombre', 'firstname') ?></td>
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
