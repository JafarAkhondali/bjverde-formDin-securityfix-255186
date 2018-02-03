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
 * Este programa � distribu�1do na esperan�a que possa ser �til, mas SEM NENHUMA
 * GARANTIA; sem uma garantia impl�cita de ADEQUA��O a qualquer MERCADO ou
 * APLICA��O EM PARTICULAR. Veja a Licen?a P�blica Geral GNU/LGPL em portugu?s
 * para maiores detalhes.
 *
 * Voc� deve ter recebido uma c�pia da GNU LGPL vers�o 3, sob o t�tulo
 * "LICENCA.txt", junto com esse programa. Se n�o, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Funda��o do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */

$frm = new TForm('Campo Num�rico');
$frm->addNumberField('num_pessoa'			,'Quantidade de pessoas:',9,false,0,true,null,5,null,null,null,true,true);
$frm->addNumberField('num_peso',             'Peso Unit�rio:',5,true,2,true)->setExampleText('Kg');
$frm->addNumberField('num_preco',            'Pre�o Unit�rio:',9,true,2,false)->setExampleText('R$');
$frm->set('num_peso','2.9');
$frm->setAction('Gravar,Testar');

$acao = isset($acao) ? $acao : null;
if($acao=='Gravar') {
	if( $frm->validate()) {
		//d($_POST);
		$bvars = $frm->createBvars('num_pessoa,val_salario,val_taxa');
		//d($bvars);
		$frm->setPopUpMessage('Valida��o OK');
	}
}
// exibir o formul�rio
$frm->show();
?>

