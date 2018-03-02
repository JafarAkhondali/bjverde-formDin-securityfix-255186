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

require_once '../classes/Ajuda.class.php';

class AjudaTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var Ajuda
	 */
	private $ajuda;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->ajuda = new Ajuda('Nome','Texto');
		$this->ajuda->setValorChave('valeuKey');
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->ajuda = null;
		parent::tearDown ();
	}
	
	public function testSetCorFundo_valor() {
		$esperado = '#EEFFE4';
		$this->ajuda->setCorFundo('#EEFFE4');
		$retorno = $this->ajuda->getCorFundo();
		
		$this->assertEquals($esperado, $retorno);
	}
	
	public function testSetCorFundo_null() {
		$esperado = '#FFFFE4';
		$retorno = $this->ajuda->getCorFundo();
		
		$this->assertEquals($esperado, $retorno);
	}
	
	/**
	 * Tests Ajuda->setCorFonte()
	 */
	public function testSetCorFonte() {
		$esperado = '#EEFFE4';
		$this->ajuda->setCorFonte('#EEFFE4');
		$retorno = $this->ajuda->getCorFonte();
		
		$this->assertEquals($esperado, $retorno);
	}
	
	public function testSetCorFonte_null() {
		$esperado = '#0000FF';
		$retorno = $this->ajuda->getCorFonte();
		
		$this->assertEquals($esperado, $retorno);
	}
}

