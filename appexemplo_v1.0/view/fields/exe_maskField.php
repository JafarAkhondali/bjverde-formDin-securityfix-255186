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

  $frm = new TForm('Exemplo de Entrada de Dados com M�scara');

  $frm->addHtmlField('ajuda','<b>Campo para entrada de dados com m�scara de edi��o<br>
		a - Representa uma letra (A-Z,a-z)<br>
		9 - Representa um n�mero (0-9)<br>
		* - Representa um caractere (A-Z,a-z,0-9)<br>
		<a href="http://digitalbush.com/projects/masked-input-plugin/" target="_blank">Visite o Site</a></b>')->setcss('margin-bottom',10);

  $frm->addMaskField('c1','C�digo:',false,'99.99.99',null,null,null,null,'99.99.99');
  $frm->addMaskField('c2','Placa do Carro:',false,'aaa-9999')->setExampleText('aaa-9999');
  $frm->addMaskField('c3','C�digo de Barras:',false,'9 999999 999999')->setExampleText('9 999999 999999');;

  $frm->addHtmlField(null,'Cora��o - Neste formul�rio, os r�tulos dos campos foram alinhados � direita utilizando o m�todo <b>$frm->setLabelsAlign("right")</b>.');
  $frm->setAction('Atualizar');
  $frm->setLabelsAlign( 'right');
  $frm->Show();
?>
