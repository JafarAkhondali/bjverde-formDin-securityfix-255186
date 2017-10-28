<?php
/*
 * Formdin Framework
 * Copyright (C) 2012 Minist�rio do Planejamento
 * Criado por Lu�s Eug�nio Barbosa
 * Essa vers�o � um Fork https://github.com/bjverde/formDin
 *
 * ----------------------------------------------------------------------------
 * This file is part of Formdin Framework.
 *
 * Formdin Framework is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License version 3
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License version 3
 * along with this program; if not,  see <http://www.gnu.org/licenses/>
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA  02110-1301, USA.
 * ----------------------------------------------------------------------------
 * Este arquivo � parte do Framework Formdin.
 *
 * O Framework Formdin � um software livre; voc� pode redistribu�-lo e/ou
 * modific�-lo dentro dos termos da GNU LGPL vers�o 3 como publicada pela Funda��o
 * do Software Livre (FSF).
 *
 * Este programa � distribu�do na esperan�a que possa ser �til, mas SEM NENHUMA
 * GARANTIA; sem uma garantia impl�cita de ADEQUA��O a qualquer MERCADO ou
 * APLICA��O EM PARTICULAR. Veja a Licen?a P�blica Geral GNU/LGPL em portugu?s
 * para maiores detalhes.
 *
 * Voc� deve ter recebido uma c�pia da GNU LGPL vers�o 3, sob o t�tulo
 * "LICENCA.txt", junto com esse programa. Se n�o, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Funda��o do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */

$menu = new TMenuDhtmlx();
$menu->add('1', null, 'Menu', null, null, 'menu-alt-512.png');
$menu->add('11', '1', 'Pessoa', 'view/pessoa.php', null, 'user916.gif');
$menu->add('12', '1', 'Tipos de Tipos', 'view/tipo_tipos.php', null);


$menu->add('2', null, 'Autoridades', null, null);
$menu->add('21', '2', 'Cadastro Autoridades', 'modulos/autoridades.php', null);


$menu->add('8', null, 'Tabelas de Apoio', null, null, 'table16.gif');
$menu->add('81', '8', 'Regi�o', 'modulos/regiao.php', null,null,null,false,null);
$menu->add('82', '8', 'UF', 'modulos/uf.php', null);
$menu->add('83', '8', 'Munic�pio ', 'modulos/municipio.php', null);

$menu->add('9', null, 'Acesso', null, null, 'icon-key-yellow.png');
$menu->add('91', '9', 'User', 'modulos/acesso_user.php', null, 'user916.gif');
$menu->add('92', '9', 'Pefil', 'modulos/acesso_perfil.php', null, 'icon_mask.png');
$menu->add('93', '9', 'Menu', 'modulos/acesso_menu.php', null, 'icon-menu.png');



$menu->add('10', null, 'Config Ambiente', null, null, 'setting-gear-512.png');
$menu->add('101', '10', 'Ambiente Resumido', 'view/ambiente_resumido.php', null, 'information-circle.jpg');
$menu->add('102', '10', 'Ambiente PHPInfo em IFrame', 'view/ambiente_phpinfo.php', null, 'php_logo.png');
$menu->add('103', '10', 'Banco MySQL', 'view/exe_teste_conexao.php', null, 'data_base.png');
$menu->add('104', '10', 'Gerador VO/DAO', '../base/includes/gerador_vo_dao.php');
$menu->add('105', '10', 'Gerador Form VO/DAO', '../base/includes/gerador_form_vo_dao.php', null, 'smiley-1-512.png');

$menu->getXml();
?>
