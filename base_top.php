<?php for( $i=0; $i<256; $i++ ) { ?><!-- Codigo Hecho Por Paris E Vazquez ---><?php } ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ES - Spanish">
    <head>
        <meta http-equiv="Content-Type" content="text/html; UTF-8">
        <title>Admon</title>
        <meta charset="UTF-8">
        <meta name="keywords" content="administracion, contactos, agenda, ingresos, gastos, control, estadisticas, notas">
        <meta name="description" content="Es un pequeño sistema para administrar tus contactos, la agenda, notas, y control de ingresos/gastos con sus estadisticas.">
        <meta name="robots" content="index,follow">
        <meta name="author" content="Paris E Vazquez">
        <meta name="reply-to" content="paris.e.vazquez@gmail.com">
        <link rev="made" href="mailto:paris.e.vazquez@gmail.com">
        <meta name="resource-type" content="homepage">
        <meta name="revisit-after" content="30 days">
        <style>
            p
            {
                margin: 0px;
                padding: 0px;
            }
            a
            {
                color: black;
            }
            h2 {
                background: #FF0000;
                text-align: center;
                color: #FFF;
                padding: 5px 20px;
                margin: 10px 0px;
            }
            em {
                display: block;
                font-weight: bolder;
                background: #f6f6f6;
                padding: 5px 20px;
            }
            ul {
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                
            }
            ul > li > h3 {
                color: #fff;
                font-weight: bolder;
                background: #666;
                margin: 0px;
                padding: 0px 20px;
            }
            li > ul > li {
                background: #f8f8f8;
                margin: 0px;
                padding: 2px 30px;
            }
            li > ul > li > a {
                color: #000;
            }
            li > ul > li > a:hover {
                color: #ff0000 !important;
            }
            .tabla-contactos > thead > tr {
                background: #666;
            }
            .tabla-contactos > thead > tr > th
            {
                color: #fff;
            }
            .tabla-contactos > tbody > tr > td {
                padding: 2px 10px;
            }
            .tabla-contactos > tbody > tr:nth-child(odd) {
                background: #f8f8f8;
            }
            .tabla-contactos > tbody > tr:hover {
                /*background: #cce;*/
                background: #FA5858;
            }
            .year, .year:hover
            {
                background: #FE2E2E !important;
            }

            .black-display {
                display: none;
                background: rgba(0,0,0,0.5);
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 98vh;
            }
            .white-square {
                background: #fff;
                position: relative;
                width: 50%;
                margin: 20vh auto;
                height: 60%;
                padding: 1em 3em;
                box-sizing: border-box;
                
            }
            .table-notes > tbody > tr > td > p::first-letter
            {
                text-transform: capitalize;
            }
            .table-notes > tbody > tr
            {
                padding: 0px;
            }
            .table-notes > tbody > tr > td
            {
                padding: 5px 10px;
            }
            .table-notes > tbody > tr > td:first-child
            {
                text-align: right;
            }
            .orderby > span > a 
            {
                color: #000;
                text-decoration: none;
            }
            .orderby
            {
                text-align: center;
            }
            .orderby > span > a:hover
            {
                color: red;
            }
            .evento-agenda
            {
                border-top: 1px solid black;
            }
            .evento-agenda:first-letter
            {
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>
        <table border="0" width="100%" style="height:96vh;">
            <tr valign="top">
                <td width="25%">
                    <div style="height:100%;overflow:auto">
                        <table align="center" width="85%">
                            <tr><td><h2>Admon 1.0</h2></td></tr>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li><strong style="text-transform: uppercase;"><?= $usuario ?></strong></li>
                                                <li><a href="<?=site_url('Base')?>">Pagina Principal</a></li>
                                                <!--
                                                <li><a href="">Administrar usuarios</a></li>
                                                -->
                                                <li><a href="<?=site_url('Home/cerrar_session')?>">Cerrar Session</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h3>Contactos</h3>
                                            <ul>
                                                <li><a href="<?=site_url('Base/crear_contactos')?>">Crear Contacto</a></li>
                                                <li><a href="<?=site_url('Base/lista_contactos')?>">Lista de Contactos</a></li>
                                                <li><a href="<?=site_url('Base/compartir_contactos')?>">Compartidos</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h3>Agenda</h3>
                                            <ul>
                                                <li><a href="<?=site_url('Base/crear_evento')?>">Nuevo Evento</a></li>
                                                <li><a href="<?=site_url('Base/agenda')?>">Agenda</a></li>
                                                <li><a href="<?=site_url('Base/compartir_eventos')?>">Compartidos</a></li>
                                            </ul>
                                        </li>
                                        <!--
                                        <li>
                                            <h3>Gastos</h3>
                                            <ul>
                                                <li><a href="">Nuevo Gasto / Ingreso</a></li>
                                                <li><a href="">Estadisticas</a></li>
                                            </ul>
                                        </li>
                                        -->
                                        <li>
                                            <h3>Notas</h3>
                                            <ul>
                                                <li><a href="<?=site_url('Base/crear_nota')?>">Nueva Nota</a></li>
                                                <li><a href="<?=site_url('Base/notas')?>">Lista de Notas</a></li>
                                                <li><a href="<?=site_url('Base/compartir_notas')?>">Compartidos</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h3>Papelera</h3>
                                            <ul>
                                                <li><a href="<?=site_url('Base/papelera_contactos')?>">Contactos</a></li>
                                                <li><a href="<?=site_url('Base/papelera_agenda')?>">Agenda</a></li>
                                                <li><a href="<?=site_url('Base/papelera_notas')?>">Notas</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td width="75%">
                    <div style="height:100%;overflow:auto">