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
/**
* Classe para implementar campos de entrada de dados de varias linhas (textareas)
*
*/
class TTextEditor extends TMemo
{
	private $showCounter;
	private $onlineSearch;
	private $resizeEnabled;

	public function __construct($strName,$strValue=null,$intMaxLength,$boolRequired=null,$intColumns=null,$intRows=null,$boolShowCounter=null)
	{
		parent::__construct($strName,$strValue,$intMaxLength,$boolRequired,$intColumns,$intRows,$boolShowCounter);
		parent::setFieldType('textEditor');
	}

	/**
	 * @return the $resizeEnabled
	 */
	public function getResizeEnabled() {
		return $this->resizeEnabled;
	}

	/**
	 * @param field_type $resizeEnabled
	 */
	public function setResizeEnabled($boolResizeEnabled) {
		if (is_bool($boolResizeEnabled))
			$this->resizeEnabled = $boolResizeEnabled;
		return $this;
	}

	public function show($print=true) {
		if ($this->getResizeEnabled()) {
//			$script=new TElement('<script>');
//			$script->add('CKEDITOR.config.resize_enabled = false;');
//			$script->show();

			$div = new TElement('div');
			$div->setId($this->getId().'_div');
			$div->add( parent::show(false).$this->getOnlineSearch());
//			$counter = new TElement('span');
//			$counter->setId($this->getId().'_counter');
//			$counter->setCss('border','none');
//			$counter->setCss('font-size','11');
//			$counter->setCss('color','#00000');
//			$div->add('<br>');
//			$div->add($counter);
			$script=new TElement('<script>');
			$script->add('// comentario.');
			$script->add('CKEDITOR.config.resize_enabled = false;');
			$div->add($script);
			return $div->show($print);
		}
		return parent::show($print).$this->getOnlineSearch();
	}

	public function getValue() {
		return str_replace(chr(147), '"', parent::getValue()); //substitui aspas erradas pelas corretas
	}


}
/*
return;
$memo = new TTextEditor('obs_exemplo','Luis',500,false,50,10);
$memo->setValue('<b>Luis Eug�nio Barbosa,</b><br><br> estou lhe enviando este e-mail para confirmar se o precos da propsota est� de acordo com o que combinamos ontem.');
$memo->show();
*/
?>