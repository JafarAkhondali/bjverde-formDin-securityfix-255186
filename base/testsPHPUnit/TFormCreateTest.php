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
        //$this->tFormCreate->setFormTitle(null);
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
    public function testSetFormPath()
    {
        // TODO Auto-generated TFormCreateTest->testSetFormPath()
        $this->markTestIncomplete("setFormPath test not implemented");
        
        $this->tFormCreate->setFormPath(/* parameters */);
    }

    /**
     * Tests TFormCreate->setFormFileName()
     */
    public function testSetFormFileName()
    {
        // TODO Auto-generated TFormCreateTest->testSetFormFileName()
        $this->markTestIncomplete("setFormFileName test not implemented");
        
        $this->tFormCreate->setFormFileName(/* parameters */);
    }

    /**
     * Tests TFormCreate->setPrimaryKeyTable()
     */
    public function testSetPrimaryKeyTable()
    {
        // TODO Auto-generated TFormCreateTest->testSetPrimaryKeyTable()
        $this->markTestIncomplete("setPrimaryKeyTable test not implemented");
        
        $this->tFormCreate->setPrimaryKeyTable(/* parameters */);
    }

    /**
     * Tests TFormCreate->setTableRef()
     */
    public function testSetTableRef()
    {
        // TODO Auto-generated TFormCreateTest->testSetTableRef()
        $this->markTestIncomplete("setTableRef test not implemented");
        
        $this->tFormCreate->setTableRef(/* parameters */);
    }

    /**
     * Tests TFormCreate->setListColunnsName()
     */
    public function testSetListColunnsName()
    {
        // TODO Auto-generated TFormCreateTest->testSetListColunnsName()
        $this->markTestIncomplete("setListColunnsName test not implemented");
        
        $this->tFormCreate->setListColunnsName(/* parameters */);
    }

    /**
     * Tests TFormCreate->setGridType()
     */
    public function testSetGridType()
    {
        // TODO Auto-generated TFormCreateTest->testSetGridType()
        $this->markTestIncomplete("setGridType test not implemented");
        
        $this->tFormCreate->setGridType(/* parameters */);
    }

    /**
     * Tests TFormCreate->addGridPagination_jsScript()
     */
    public function testAddGridPagination_jsScript()
    {
        // TODO Auto-generated TFormCreateTest->testAddGridPagination_jsScript()
        $this->markTestIncomplete("addGridPagination_jsScript test not implemented");
        
        $this->tFormCreate->addGridPagination_jsScript(/* parameters */);
    }

    /**
     * Tests TFormCreate->addGrid()
     */
    public function testAddGrid()
    {
        // TODO Auto-generated TFormCreateTest->testAddGrid()
        $this->markTestIncomplete("addGrid test not implemented");
        
        $this->tFormCreate->addGrid(/* parameters */);
    }

    /**
     * Tests TFormCreate->showForm()
     */
    public function testShowForm()
    {
        // TODO Auto-generated TFormCreateTest->testShowForm()
        $this->markTestIncomplete("showForm test not implemented");
        
        $this->tFormCreate->showForm(/* parameters */);
    }

    /**
     * Tests TFormCreate->saveForm()
     */
    public function testSaveForm()
    {
        // TODO Auto-generated TFormCreateTest->testSaveForm()
        $this->markTestIncomplete("saveForm test not implemented");
        
        $this->tFormCreate->saveForm(/* parameters */);
    }
}

