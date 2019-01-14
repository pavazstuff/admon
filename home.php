<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <style>
            h1 {
                background: #FF0000;
                text-align: center;
                color: #FFF;
                padding: 5px 20px;
                margin: 10px 0px;
            }
        </style>
    </head>
    <body>
        <table border="0" width="100%" style="height:96vh;">
            <tr>
                <td width="30%">
                    
                    <form action="" method="POST">
                        <table align="center">
                            <tr>
                                <td colspan="2">
                                    <img src="<?= base_url()?>static/img.png" width="100%" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><label for="usuario"><strong>Usuario</strong></label></td>
                                <td><input type="text" id="usuario" name="usuario"></td>
                            </tr>
                            <tr>
                                <td align="right"><label for="clave"><strong>Clave</strong></label></td>
                                <td><input type="password" id="clave" name="clave"></td>
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="submit" value="Acceder"></td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td width="70%">
                    <table align="center">
                        <tr>
                            <td>
                                <h1>Admon 1.0</h1>
                                <p><em>El mejor programa en getión personal.</em></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>