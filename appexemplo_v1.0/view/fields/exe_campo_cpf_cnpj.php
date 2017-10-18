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

$frm = new TForm('Exemplo Campo CPF/CNPJ',220,600);

//$frm->addCpfCnpjField('cpf_cnpj1','CPF/CNPJ:',false)->setExampleText('Mensagem Padr�o / Limpar se inconpleto');

$frm->addCpfCnpjField('cpf_cnpj2','CPF/CNPJ:',false,null,true,null,null,null,null,'myCb')->setExampleText('Tratamento no callback');
/**/
$frm->addCpfCnpjField('cpf_cnpj3','CPF/CNPJ:',false,null,true,null,null,'CPF/CNPJ Inv�lido',false)->setExampleText('Mensagem Customizada / Limpar se inconpleto');
$frm->addCpfCnpjField('cpf_cnpj4','CPF/CNPJ:',false,null,true,null,null,'CPF/CNPJ Inv�lido',true)->setExampleText('Mensagem Customizada / N�o limpar se inconpleto');
$frm->addCpfField('cpf'	,'CPF:',false);
$frm->addCnpjField('cnpj','CNPJ:',false);
/**/
$frm->show();
?>
<script>
function myCb(valido,e,event)
{
	if( valido )
	{
		if (e.value != '' )
		{
			fwAlert('SUCESSO!!!! Cpf/Cnpj est� v�lido');
		}
	}
	else
	{
		fwAlert('Oooooops!!! Cpf/Cnpj est� inv�lido');
		e.value='';
	}
}
</script>