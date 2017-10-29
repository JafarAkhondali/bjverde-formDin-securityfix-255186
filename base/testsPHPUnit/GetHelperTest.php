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
require_once '../classes/helpers/GetHelper.class.php';

/**
 * GetHelper test case.
 */
class GetHelperTest extends PHPUnit_Framework_TestCase {

    public function testGet_tem() {
        $esperado = 10;
        $_GET['x']= $esperado;
        $retorno = GetHelper::get('x');        
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testGet_Naotem() {
        $esperado = '';
        $_GET['x']= 123;
        $retorno = GetHelper::get('z');
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testGetDefaultValeu_temValor(){
        $esperado = 10;
        $_GET['x']= $esperado;
        $retorno = GetHelper::getDefaultValeu('x','padrao');        
        $this->assertEquals($esperado, $retorno);
    }

    public function testGetDefaultValeu_NaoValor(){
        $esperado = 'padrao';
        $_GET['x']= 10;
        $retorno = GetHelper::getDefaultValeu('y','padrao');
        $this->assertEquals($esperado, $retorno);
    }    
    
    public function testHas_true() {
        $_GET['parametro']='tem';
        $retorno = GetHelper::has('parametro');
        $this->assertTrue($retorno);
    }
    
    public function testHas_false() {
        $retorno = GetHelper::has('naotem');
        $this->assertFalse($retorno);
    }
}

