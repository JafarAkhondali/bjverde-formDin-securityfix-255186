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
require_once '../classes/constants.php';
require_once '../classes/webform/TFormCreate.class.php';


/**
 * TFormCreate test case.
 */
class TFormCreateTest extends PHPUnit_Framework_TestCase {

    /**
     *
     * @var TFormCreate
     */
    private $tFormCreate;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(){
        parent::setUp();        
        $this->tFormCreate = new TFormCreate();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown(){
        // TODO Auto-generated TFormCreateTest::tearDown()
        $this->tFormCreate = null;        
        parent::tearDown();
    }

    /**
     * Tests TFormCreate->setFormTitle()
     */
    public function testSetFormTitle_null(){
        $expected = 'titulo';
        $result = $this->tFormCreate->getFormTitle();
        $this->assertEquals( $expected, $result);
    }

    /**
     * Tests TFormCreate->setFormTitle()
     */
    public function testSetFormTitle_setValue(){
        $expected = 'KTg';
        $this->tFormCreate->setFormTitle($expected);
        $result = $this->tFormCreate->getFormTitle();
        $this->assertEquals( $expected, $result);
    }
    
    /**
     * Tests TFormCreate->setFormPath()
     */
    public function testSetFormPath_null(){
    	$expected = '/modulos';
    	$result = $this->tFormCreate->getFormPath();
    	$this->assertEquals( $expected, $result);
    }

    /**
     * Tests TFormCreate->setFormPath()
     */
    public function testSetFormPath_setValue(){
    	$expected = '/modsw';
    	$this->tFormCreate->setFormPath($expected);
    	$result = $this->tFormCreate->getFormPath();
    	$this->assertEquals( $expected, $result);
    }
    
    /**
     * Tests TFormCreate->setFormFileName()
     */
    public function testSetFormFileName_null() {
        $expected = "form-".date('Ymd-Gis');
        $result = $this->tFormCreate->getFormFileName();        
        $this->assertEquals( $expected, $result);
    }
    
    /**
     * Tests TFormCreate->setFormFileName()
     */
    public function testSetFormFileName_setValue() {
    	$expected = "lolo";
    	$result = $this->tFormCreate->setFormFileName($expected);
    	$result = $this->tFormCreate->getFormFileName();
    	$this->assertEquals( $expected, $result);
    }

    /**
     * Tests TFormCreate->setPrimaryKeyTable()
     */
    public function testSetPrimaryKeyTable_null(){
    	$expected = "ID";
    	$result = $this->tFormCreate->getPrimaryKeyTable();
    	$this->assertEquals( $expected, $result);
    }
    
    /**
     * Tests TFormCreate->setPrimaryKeyTable()
     */
    public function testSetPrimaryKeyTable_setValue(){
    	$expected = "COD";
    	$result = $this->tFormCreate->setPrimaryKeyTable($expected);
    	$result = $this->tFormCreate->getPrimaryKeyTable();
    	$this->assertEquals( $expected, $result);
    }

    /**
     * Tests TFormCreate->setGridType()
     */
    public function testSetGridType_null(){
    	$result = $this->tFormCreate->getGridType();
    	$this->assertEquals( GRID_SIMPLE, $result);
    }
    
    /**
     * Tests TFormCreate->setGridType()
     */
    public function testSetGridType_setValue(){
    	$expected = GRID_SQL_PAGINATION;
    	$this->tFormCreate->setGridType($expected);
    	$result = $this->tFormCreate->getGridType();
    	$this->assertEquals( $expected, $result);
    }

    /**
     * Tests TFormCreate->addGridPagination_jsScript()
     */
    public function testAddGridPagination_jsScript_sizeArray() {
    	$this->tFormCreate->setFormFileName('xxx');        
        $this->tFormCreate->addGridPagination_jsScript();
        $resultArray = $this->tFormCreate->getLinesArray();
        $size = count($resultArray);
        $this->assertEquals( 10, $size);
    }
}

