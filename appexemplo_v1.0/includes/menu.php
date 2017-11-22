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
 * APLICA��O EM PARTICULAR. Veja a Licen�a P�blica Geral GNU/LGPL em portugu�s
 * para maiores detalhes.
 *
 * Voc� deve ter recebido uma c�pia da GNU LGPL vers�o 3, sob o t�tulo
 * "LICENCA.txt", junto com esse programa. Se n�o, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Funda��o do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */


// url para teste: http://index.php?modulo=menu_principal.php&ajax=1&content-type=xml
$menu =  new TMenuDhtmlx();
$menu->add('1',null,'Campos',null,null,'user916.gif');
$menu->add('11','1','Campo Texto',null,'Declara��o de texto' );
	$menu->add('11.1','11','Campo Texto','view/fields/exe_TextField.php')->setJsonParams("{'p1':'parametro_1','p2':'parametro_2'}");
	$menu->add('11.2','11','Autocompletar','view/fields/exe_autocomplete.php');
	$menu->add('11.3','11','Autocompletar II','view/fields/exe_autocomplete2.php');
	$menu->add('11.4','11','Consulta On-line I','view/fields/exe_onlinesearch1.php');
	$menu->add('11.5','11','Entrada com M�scara','view/fields/exe_maskField.php');
	$menu->add('11.6','11','Campo Editor com CkEditor'	,'view/fields/exe_TTextEditor.php');
	$menu->add('11.7','11','Campo Memo com tinyMCE'	,'view/fields/exe_TMemo.php');
$menu->add('12','1','Campo HTML');
	$menu->add('12.1','12','Campo HTML','view/fields/exe_HtmlField.php');
	$menu->add('12.2','12','Campo HTML com iFrame','modulos/iframe_phpinfo/ambiente_phpinfo.php');
$menu->add('13','1','Campo Coord GMS');
	$menu->add('13.1','13','Campo Coord GMS','view/fields/exe_CoordGmsField.php');
	$menu->add('13.2','13','Campo Coord GMS 02','view/fields/exe_CoordGmsField02.php');
$menu->add('14','1','Campo Select','view/fields/exe_SelectField.php');
$menu->add('15','1','Campo Radio','view/fields/exe_RadioField.php');
$menu->add('16','1','Campo Check','view/fields/exe_CheckField.php');
$menu->add('17','1','Campo Arquivo');
	$menu->add('171','17','Assincrono','view/fields/exe_FileAsync.php');
	$menu->add('172','17','Normal','view/fields/exe_TFile.php');
	$menu->add('173','17','TAssincrono','view/fields/exe_TFileAsync.php');
$menu->add('18','1','Campo Num�rico','view/fields/exe_NumberField.php');
$menu->add('19','1','Campo Brasil');
	$menu->add('191','19','Campo CEP'	,'view/fields/exe_CepField.php');
	$menu->add('292','19','Campo Telefone'	,'view/fields/exe_FoneField.php');
	$menu->add('193','19','Campo Cpf/Cnpj'	,'view/fields/exe_campo_cpf_cnpj.php');
$menu->add('110','1','Campos Data e hora');
	$menu->add('1101','110','Campo Data' ,'view/fields/exe_DateField.php');
	$menu->add('1102','110','Campo Hora' ,'view/fields/exe_campo_hora.php');
	$menu->add('1104','110','Campo Agenda'	,'view/fields/exe_TCalendar.php');
$menu->add('111','1','Campo Select Diretorio/Pasta'	,'view/fields/exe_OpenDirField.php');

$menu->add('115','1','Campo Senha'	,'view/fields/exe_TPasswordField.php');

$menu->add('117','1','Campo Captcha'	,'view/fields/exe_TCaptchaField.php');
$menu->add('118','1','Campo Blob'	);
	$menu->add('1181','118','Campo Blob Salvo no Banco'		,'view/fields/exe_fwShowBlob.php');
	$menu->add('1182','118','Campo Blob Salvo no Disco'		,'view/fields/exe_fwShowBlobDisco.php');
$menu->add('119','1','Campo Cor'		,'view/fields/exe_TColorPicker.php');
$menu->add('120','1','Tecla de Atalho'	,'view/fields/exe_Shortcut.php');
$menu->add('121','1','Campo Link','view/fields/exe_field_link.php');
//Redirect s� funciona se o arquivo estiver na pasta modulos
$menu->add('122','1','Redirect','exe_redirect.inc');
$menu->add('123','1','TZip','exe_TZip.php');

//-----------------------------------------------------------------------------
$menu->add('2',null,'Containers');
	$menu->add('22','2','Grupo');
		$menu->add('221','22','Grupo 01 Normal','group/exe_GroupField01.php');
		$menu->add('222','22','Grupo 02 Combinados, ( Efeito Sanfona )','group/exe_GroupField02.php');
		$menu->add('223','22','Grupo 03 Combinados, muda cor fundo','group/exe_groupField03.php');
	$menu->add('23','2','Abas');
		$menu->add('231','23','Aba'		,'view/containers/exe_aba_1.php');
		$menu->add('232','23','Aba2'	,'view/containers/exe_aba_2.php');
		$menu->add('233','23','Aba3'	,'view/containers/exe_aba_3.php');
		$menu->add('234','23','Aba4'	,'view/containers/exe_aba_4.php');
		$menu->add('235','23','Aba5'	,'view/containers/exe_aba05_pagacontrol.php');
	$menu->add('24','2','TreeView');
		$menu->add('241','24','Dentro do Formul�rio' ,'tree/exe_tree_view_1.php');
		$menu->add('242','24','Fora do Formul�rio'	,'tree/exe_tree_view_2.php');
		$menu->add('243','24','User Data - Array'	,'tree/exe_tree_view_3.php');
		$menu->add('244','24','Uf x Munic�pios'		,'tree/exe_tree_view_4.php');
		$menu->add('245','24','Uf x Munic�pios com SetXmlFile()' ,'tree/exe_tree_view_5.php');
		$menu->add('246','24','Fora do Formul�rio' ,'exe_tree_view.php');

//-----------------------------------------------------------------------------
$menu->add('4',null,'Mensagens e Ajuda');
	$menu->add('40','4','Hints / Tooltips','exe_hint.php');
	$menu->add('41','4','Mensagens');
		$menu->add('411','41','Exemplo 1','view/messages/exe_mensagem.php');
		$menu->add('412','41','Caixa de Confirma��o','view/messages/exe_confirmDialog.php');
		$menu->add('413','41','Caixa de Confirma��o 2','view/messages/exe_confirm_dialog.php');
	$menu->add('42','4','Ajuda');
		$menu->add('421','42','Ajuda com arquivo HTML','exe_campo_ajuda.php','Com um arquivo HTML separado');
		$menu->add('422','42','Ajuda On-line (sqlite)','exe_documentacao_online.php','Confe??o do texto de ajuda gravando no banco de dados sqlite');
		$menu->add('423','42','Ajuda On-line (sqlite) - ERRO','exe_help_online_1.php');

//-----------------------------------------------------------------------------
$menu->add('5',null,'Ajax');
	$menu->add('51','5','Exemplo 1','ajax/exe_ajax01.php');
	$menu->add('52','5','Atualizar Campos','ajax/exe_ajax02.php');
	$menu->add('53','5','Ajax com Sem�foro','ajax/exe_ajax03_semaphore.php');
	$menu->add('54','5','Ajax 04','ajax/exe_ajax04.php');
	$menu->add('55','5','Ajax 05','ajax/exe_ajax05.php');

//-----------------------------------------------------------------------------
$menu->add('6',null,'PDF');
	$menu->add('61','6','Exemplo 1','pdf/exe_pdf01.php');
	$menu->add('62','6','Exemplo 2','pdf/exe_pdf02.php');
	$menu->add('63','6','Exemplo 3, com passagem de parametros via Json','pdf/exe_pdf03.php');
	$menu->add('64','6','Exemplo 4','pdf/exe_pdf04.php');

//-----------------------------------------------------------------------------
$menu->add('8',null,'Gride');
	$menu->add('8.1','8','Gride 01 - bot�es sobre grid','grid/exe_gride01.php');
	$menu->add('8.2','8','Gride 02 - Anexos e imagens - Ajax','grid/exe_gride02.php');
	$menu->add('8.3','8','Gride 03 - Offline','grid/exe_gride03.php');
	$menu->add('8.4','8','Gride 04 - fwGetGrid()','grid/exe_gride04.php');
	$menu->add('8.5','8','Gride 05 - Pagina��o','grid/exe_gride05_paginacao.php');
	$menu->add('8.6','8','Gride 06 - Campos 1','grid/exe_gride06.php');
	$menu->add('8.7','8','Gride 07 - Campos 2','grid/exe_gride07.php');
	$menu->add('8.8','8','Gride 08 - Campos 3','grid/exe_gride08.php');
	$menu->add('8.9','8','Gride 09 - erro','grid/exe_gride_09.php');
	$menu->add('8.10','8','Gride 10 - erro','grid/exe_gride10.php');
	$menu->add('8.11','8','Gride 11 Offine 02 - erro','grid/exe_gride11.php');
	$menu->add('8.13','8','Gride 13 com imagens','grid/exe_gride13.php');

//-----------------------------------------------------------------------------
$menu->add('9',null,'Banco e PDO',null,'Exemplo de Recursos para conectar nos bancos de dados','data_base.png');
	$menu->add('91','9','Exemplo Mysql','pdo/exe_pdo_1.php');
	$menu->add('92','9','Exemplo Sqlite e Mysql','pdo/exe_pdo_2.php');
	$menu->add('93','9','Exemplo Postgres');
		$menu->add('931','93','DAO e VO','pdo/pg/exe_pgsql01.php');
		$menu->add('932','93','Cadastro Arquivo Postgres','pdo/exe_pdo_4.php');
		$menu->add('933','93','Postgres SQL 02','pdo/pg/exe_pgsql02.php');
		$menu->add('933','93','Postgres SQL 03','pdo/pg/exe_pgsql03.php');
	$menu->add('94','9','PDO Firebird','pdo/exe_pdo_firebird01.php');	
	$menu->add('96','9','Testar Conex�o','pdo/exe_teste_conexao.php');
	$menu->add('97','9','Dados de Apoio','pdo/exe_pdo_6_apoio.php');
	$menu->add('98','9','Banco Textual DBM (db4)','pdo/exe_db4.php');


//-----------------------------------------------------------------------------
$menu->add('10',null,'Formul�rio');
	$menu->add('10.1','10','Normal','view/form/exe_TForm.php');
	$menu->add('10.2','10','Subcadastro','view/form/exe_TForm2.php');
	$menu->add('10.3','10','Boxes','view/form/exe_TBox.php');
	$menu->add('10.4','10','Mestre Detalhe com Ajax','cad_mestre_detalhe/cad_mestre_detalhe.php');
	$menu->add('10.5','10','Imagem de Fundo','view/form/exe_TFormImage.php');
	$menu->add('10.6','10','Customizado com CSS','view/form/exe_TForm3.php');
	$menu->add('10.7','10','Recurso de Autosize','view/form/exe_TForm_autosize.php');
	$menu->add('10.8','10','Tela Login','view/form/exe_tela_login.php');
	$menu->add('10.9','10','Cadastro on-line (CRUD)','view/form/exe_crud_online.php');
	$menu->add('10.10','10','Definir Colunas no Formul�rio','view/form/exe_colunas.php');
	$menu->add('10.11','10','Local Destino','view/form/exe_form_local_destino.php');

$menu->add('199',null,'Gerador de C�digo',null,'Formularios geradores de codigo','settings_tool_preferences-512.png');
	$menu->add('199.1','199','Gerador VO/DAO','../base/includes/gerador_vo_dao.php');
	$menu->add('199.2','199','Gerador Form VO/DAO', '../base/includes/gerador_form_vo_dao.php', null, '../base/imagens/smiley-1-512.png');
	
//-----------------------------------------------------------------------------
$menu->add('200',0,'Layout');
	$menu->add('201','200','Layout index','layouts.php');	
	$menu->add('202','200','Temas do Menu','exe_menu_tema.php');
	$menu->add('203','200','Esqueleto do Layout','exe_layout_1.php');


$menu->getXml();
?>