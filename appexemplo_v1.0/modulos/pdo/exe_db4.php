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

$html = '<b>Exemplo de utiliza��o do DBM Database</b>'
		.'<br> ATEN��O : Esse exemplo s� ir� funcionar se tiver o modulo dbase. Clique no bot�o ver PHPInfo e verifique'
        .'<br>Clique no bot�o gravar para gravar o texto do campo observa��o em disco e Recuperar para trazer o<br>texto salvo para o campo novamente.</b>';

$frm = new TForm('Campo Banco de Dados Textual DB4',400,600);
$frm->addHtmlField('texto',$html);
$frm->addButton('PHPinfo', null, 'PHPinfo', null, null, true, false);
$frm->addHtmlField('html1','');
$frm->addMemoField('obs','Observa��o:',1000,false,50,5);
$frm->setAction('Gravar,Recuperar');


$acao = isset($acao) ? $acao : null;
switch( $acao ) {
	case 'PHPinfo':
		$frm->redirect('iframe_phpinfo/ambiente_phpinfo.php', 'Redirect realizado com sucesso.', false, null );
		//$frm->redirect('exe_redirect_form2.inc','Redirect realizado com sucesso. Voc� est� agora no 2� form.',true);
		break;
		//--------------------------------------------------------------------------------
	case 'Recuperar':
		$dir  	= $frm->getBase().'tmp/';
		$type	= 'db4';
		$file 	= 'sisteste.'.$type;
		$key  	= md5('SISTESTE_EXE_CAMPO_MEMO_OBS');
		$dbh = dba_open($dir.$file,'c',$type) or die('Erro');
		// retrieve and change values
		if (dba_exists($key,$dbh)) {
			$frm->setValue('obs',dba_fetch($key,$dbh));
		}
		dba_close($dbh);
		break;
		//--------------------------------------------------------------------------------
	case 'Gravar':
		$dir  	= $frm->getBase().'tmp/';
		$type	= 'db4';
		$file 	= 'sisteste.'.$type;
		$key  	= md5('SISTESTE_EXE_CAMPO_MEMO_OBS');
		$dbh = dba_open($dir.$file,'c',$type) or die('Erro');
		// retrieve and change values
		dba_replace($key,$frm->getValue('obs'),$dbh);
		$frm->setPopUpMessage('Arquivo Atualizado');
		/*
		 // listar o arquivo
		 for ($key = dba_firstkey($dbh);  $key !== false; $key = dba_nextkey($dbh))
		 {
		 $value = dba_fetch($key,$dbh);
		 }
		 dba_close($dbh);
		 */
		
		/*
		 $dir_handle = opendir ($dir) or die ("Could not open directory <i>$dir</i>.");
		 while ($entry = readdir ($dir_handle))
		 {
		 $entry = $dir . '/' . $entry;
		 
		 if (is_dir ($entry) and substr ($entry, 0, -3) == '.db')
		 $dbm_list[] = $entry;
		 }
		 
		 foreach ($dbm_list as $dbm_file)
		 {
		 // Use the @ to ignore failed open attempts
		 $dba_handle = @ dba_open ($dbm_file, 'r', 'db4');
		 
		 $key = dba_firstkey ($dba_handle);
		 
		 if ($key !== FALSE)
		 {
		 echo "<br><br>DBM FILE: $dbm_file<br>";
		 while ($key !== FALSE)
		 {
		 printf ("%-'.16s..%'.16s<br>", "<b>$key</b>", dba_fetch ($key, $dba_handle));
		 $key = dba_nextkey ($dba_handle);
		 }
		 }
		 }
		 */
		break;
}
// exibir o formul�rio
$frm->show();
?>
