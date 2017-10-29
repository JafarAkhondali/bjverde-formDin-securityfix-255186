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

define('EOL',"\n");
define('TAB',chr(9));
class TDAOCreate
{
	private $tableName;
	private $aColumns;
	private $lines;
	private $keyColumnName;
	private $path;
	private $bdType;
	private $showSchema;
	private $charParam = '?';

	public function __construct($strTableName=null,$strkeyColumnName=null,$strPath=null,$bdType=null)
	{
		$this->aColumns=array();
		$this->setTableName($strTableName);
		$this->keyColumnName = $strkeyColumnName;
		$this->path = $strPath;
		$this->bdType = strtoupper($bdType);
		if( $bdType == 'POSTGRES' )
		{
			$this->charParam = '$1';
		}

	}
	//-----------------------------------------------------------------------------------
	public function setTableName($strNewValue)
	{
		$this->tableName=$strNewValue;
	}
	//------------------------------------------------------------------------------------
	public function getTableName() {
		return $this->tableName;
	}
	//------------------------------------------------------------------------------------
	public function getKeyColumnName() {
		return $this->keyColumnName;
	}
	//------------------------------------------------------------------------------------
	public function setShowSchema($showSchema){
	    return $this->showSchema = $showSchema;
	}
	//------------------------------------------------------------------------------------
	public function getShowSchema(){
	    return $this->showSchema;
	}
	//------------------------------------------------------------------------------------
	public function hasSchema(){
	    $result = '';
	    if($this->getShowSchema() == true){
	        $result = '\'.SCHEMA.\'';
	    }	    
	    return $result;
	}
	//------------------------------------------------------------------------------------
	public function getCharParam() {
		return $this->charParam;
	}
	//------------------------------------------------------------------------------------
	public function getLinesArray(){
		return $this->lines;
	}
	//------------------------------------------------------------------------------------
	public function getLinesString(){
		$string = implode($this->lines);
		return trim($string);
	}
	//------------------------------------------------------------------------------------
	public function addColumn($strColumnName)
	{
		if ( !in_array($strColumnName,$this->aColumns))
		{
			$this->aColumns[] = strtolower($strColumnName);
		}
	}
	//--------------------------------------------------------------------------------------
	public function getColumns()
	{
		return $this->aColumns;
	}
	//--------------------------------------------------------------------------------------
	public function addLine($strNewValue=null,$boolNewLine=true){
		$strNewValue = is_null( $strNewValue ) ? TAB.'//' . str_repeat( '-', 80 ) : $strNewValue;
		$this->lines[] = $strNewValue.( $boolNewLine ? EOL : '');
	}
	//--------------------------------------------------------------------------------------
	private function addBlankLine(){
		$this->addLine('');
	}
	//--------------------------------------------------------------------------------------
	public function showVO($print=false)
	{   $this->addLine('<?php');
		$this->addLine("class ".ucfirst($this->getTableName())."VO");
		$this->addLine("{");
		$cols='';
		$sets='';
		foreach($this->getColumns() as $k => $v )
		{
			$this->addLine(TAB.'private $'.$v.' = null;');
			$cols .= $cols == '' ? '' : ', ';
			$cols .='$'.$v.'=null';
			$sets .= ($k == 0 ? '' : EOL ).TAB.TAB.'$this->set'.ucFirst($v).'( $'.$v.' );';
		}
		$this->addLine(TAB.'public function '.ucfirst($this->getTableName()).'VO( '.$cols.' )');
		$this->addLine(TAB.'{');
		$this->addLine($sets);
		$this->addLine(TAB.'}');
		$this->addLine();
		foreach($this->getColumns() as $k=>$v)
		{
			$this->addLine(TAB.'function set'.ucfirst($v).'( $strNewValue = null )');
			$this->addLine(TAB."{");
			if( preg_match('/cpf|cnpj/i',$v) > 0 )
			{
				$this->addLine(TAB.TAB.'$this->'.$v.' = preg_replace(\'/[^0-9]/\',\'\',$strNewValue);');
			}
			else
			{
				$this->addLine(TAB.TAB.'$this->'.$v.' = $strNewValue;');
			}
			$this->addLine(TAB."}");
			$this->addLine(TAB.'function get'.ucfirst($v).'()');
			$this->addLine(TAB."{");
			if(preg_match('/^data?_/i',$v) == 1 )
			{
				$this->addLine(TAB.TAB."return is_null( \$this->{$v} ) ? date( 'Y-m-d h:i:s' ) : \$this->{$v};");
			}
			else
			{
				$this->addLine(TAB.TAB.'return $this->'.$v.';');
			}
			$this->addLine(TAB."}");
			$this->addLine();
		}
		$this->addLine("}");
		$this->addLine('?>');
		if( $print) {
			echo trim(implode($this->lines));
		}else {
			return trim(implode($this->lines));
		}
	}
	
	//--------------------------------------------------------------------------------------
	public function saveVO($fileName=null) {
		$fileName = $this->path.( is_null($fileName) ? ucfirst($this->getTableName()).'VO.class.php' : $tableName);
		
		if($fileName) {
			if( file_exists($fileName)) {
				unlink($fileName);
			}
			file_put_contents($fileName,$this->showVO(false));
		}
	}
	
	//--------------------------------------------------------------------------------------
	/***
	 * Create variable with string sql basica
	 **/
	public function addSqlVariable() {
		$indent = TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.' ';
		$this->addLine( TAB.'private static $sqlBasicSelect = \'select');
		foreach($this->getColumns() as $k=>$v) {
			$this->addLine($indent.( $k==0 ? ' ' : ',').$v);
		}
		$this->addLine($indent.'from '.$this->hasSchema().$this->getTableName().' \';' );
	}
	
	//--------------------------------------------------------------------------------------
	/***
	 * Create function for sql count rows of table
	 **/
	public function addSqlSelectCount() {
		$this->addLine( TAB.'public static function selectCount(){');
		$this->addLine( TAB.TAB.'$sql = \'select count('.$this->getKeyColumnName().') as qtd from '.$this->hasSchema().$this->getTableName().'\';' );
		$this->addLine( TAB.TAB.'$result = self::executeSql($sql);');
		$this->addLine( TAB.TAB.'return $result[\'QTD\'][0];');
		$this->addLine( TAB.'}');
	}
		
	//--------------------------------------------------------------------------------------
	/***
	 * Create function for sql select by id
	 **/
	public function addSqlSelectById() {
	    $this->addLine( TAB.'public static function select( $id ) {');
	    $this->addLine( TAB.TAB.'$values = array($id);');
	    $this->addLine( TAB.TAB.'$sql = self::$sqlBasicSelect.\' where '.$this->getKeyColumnName().' = '.$this->charParam.'\';');
		$this->addLine( TAB.TAB.'$result = self::executeSql($sql, $values );');
		$this->addLine( TAB.TAB.'return $result;');
	    $this->addLine( TAB.'}');
	}
	
	//--------------------------------------------------------------------------------------
	/***
	 * Create function for sql select all 
	 **/
	public function addSqlSelectAll() {
	    $this->addLine( TAB.'public static function selectAll( $orderBy=null, $where=null ) {');
	    $this->addLine( TAB.TAB.'$sql = self::$sqlBasicSelect');
	    $this->addLine( TAB.TAB.'.( ($where)? \' where \'.$where:\'\')');
	    $this->addLine( TAB.TAB.'.( ($orderBy) ? \' order by \'.$orderBy:\'\');');
	    $this->addBlankLine();
	    $this->addLine( TAB.TAB.'$result = self::executeSql($sql);');
	    $this->addLine( TAB.TAB.'return $result;');
	    $this->addLine( TAB.'}');
	}
	
	
	/***
	 * Create function for sql select all with Pagination
	 **/
	public function addSqlSelectAllPagination() {
		$this->addLine( TAB.'public static function selectAllPagination( $orderBy=null, $where=null, $page=null,  $rowsPerPage= null ) {');
		$this->addLine( TAB.TAB.'$rowStart = paginationMySQLHelper::getRowStart($page,$rowsPerPage);');
		$this->addBlankLine();
		$this->addLine( TAB.TAB.'$sql = self::$sqlBasicSelect');
		$this->addLine( TAB.TAB.'.( ($where)? \' where \'.$where:\'\')');
		$this->addLine( TAB.TAB.'.( ($orderBy) ? \' order by \'.$orderBy:\'\');');
		$this->addLine( TAB.TAB.'.( \' LIMIT \'.$rowStart.\',\'.$rowsPerPage);');
		$this->addBlankLine();
		$this->addLine( TAB.TAB.'$result = self::executeSql($sql);');
		$this->addLine( TAB.TAB.'return $result;');
		$this->addLine( TAB.'}');
	}
	//--------------------------------------------------------------------------------------
	/***
	 * Create function for sql insert
	 **/
	public function addSqlInsert() {
	    $this->addLine(TAB.'public static function insert( '.ucfirst($this->tableName).'VO $objVo ) {');
	    $this->addLine(TAB.TAB.'if( $objVo->get'.ucFirst($this->keyColumnName).'() ) {');
	    $this->addLine(TAB.TAB.'	return self::update($objVo);');
	    $this->addLine(TAB.TAB.'}');
	    $this->addLine(TAB.TAB.'$values = array(',false);
	    $cnt=0;
	    foreach($this->getColumns() as $k=>$v) {
	        if( $v != $this->keyColumnName) {
	            $this->addLine(( $cnt++==0 ? ' ' : TAB.TAB.TAB.TAB.TAB.TAB.',').' $objVo->get'.ucfirst($v).'() ');
	        }
	    }
	    $this->addLine(TAB.TAB.TAB.TAB.TAB.TAB.');');
	    $this->addLine(TAB.TAB.'return self::executeSql(\'insert into '.$this->hasSchema().$this->getTableName().'(');
	    $cnt=0;
	    foreach($this->getColumns() as $k=>$v) {
	        if( $v != $this->keyColumnName) {
	            $this->addLine(TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.( $cnt++==0 ? ' ' : ',').$v);
	        }
	    }
	    //$this->addLine(TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.') values (?'.str_repeat(',?',count($this->getColumns())-1 ).')\', $values );');
	    $this->addLine(TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.') values ('.$this->getParams().')\', $values );');
	    $this->addLine(TAB.'}');
	}
	
	//--------------------------------------------------------------------------------------
	/***
	 * Create function for sql update
	 **/
	public function addSqlUpdate() {
	    $this->addLine(TAB.'public static function update ( '.ucfirst($this->tableName).'VO $objVo )');
	    $this->addLine(TAB.'{');
	    $this->addLine(TAB.TAB.'$values = array(',false);
	    $count=0;
	    foreach($this->getColumns() as $k=>$v) {
	        if( strtolower($v) != strtolower($this->keyColumnName)) {
	            $this->addLine(( $count==0 ? ' ' : TAB.TAB.TAB.TAB.TAB.TAB.',').'$objVo->get'.ucfirst($v).'()');
	            $count++;
	        }
	    }
	    $this->addline(TAB.TAB.TAB.TAB.TAB.TAB.',$objVo->get'.ucfirst($this->keyColumnName).'() );');
	    $this->addLine(TAB.TAB.'return self::executeSql(\'update '.$this->hasSchema().$this->getTableName().' set ');
	    $count=0;
	    foreach($this->getColumns() as $k=>$v) {
	        if( strtolower($v) != strtolower($this->keyColumnName)) {
	            $param = $this->bdType=='POSTGRES' ? '$'.($count+1) : '?';
	            $this->addLine(TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.( $count==0 ? ' ' : ',').$v.' = '.$param);
	            $count++;
	        }
	    }
	    $param = $this->bdType=='POSTGRES' ? '$'.($count+1) : '?';
	    $this->addLine(TAB.TAB.TAB.TAB.TAB.TAB.TAB.TAB.'where '.$this->keyColumnName.' = '.$param.'\',$values);');
	    $this->addLine(TAB.'}');
	}
	
	//--------------------------------------------------------------------------------------
	/***
	 * Create function for sql delete
	 **/
	public function addSqlDelete() {
		$this->addLine( TAB.'public static function delete( $id ){');
		$this->addLine( TAB.TAB.'$values = array($id);');
		$this->addLine( TAB.TAB.'return self::executeSql(\'delete from '.$this->hasSchema().$this->getTableName().' where '.$this->keyColumnName.' = '.$this->charParam.'\',$values);');
		$this->addLine( TAB.'}');
	}
	
	//--------------------------------------------------------------------------------------
	public function showDAO($print=false) {
		$this->lines=null;
		$this->addLine('<?php');
		$this->addLine('class '.ucfirst($this->getTableName()).'DAO extends TPDOConnection {');
		$this->addBlankLine();
		$this->addSqlVariable();
		$this->addBlankLine();		
		// construct
		$this->addLine(TAB.'public function '.$this->getTableName().'DAO() {');
		$this->addLine(TAB.'}');
		
		// Select Count
		$this->addLine();
		$this->addSqlSelectCount();
		// fim Select Count
		
		// select by Id
		$this->addLine();
		$this->addSqlSelectById();
		// fim select
		
		// select where		
		$this->addLine();
		$this->addSqlSelectAll();
		// fim select
		
		// insert
		$this->addLine();
		$this->addSqlInsert();
		//FIM INSERT
		
		// update
		$this->addLine();
		$this->addSqlUpdate();
		//FIM UPDATE
		
		// EXCLUIR
		$this->addLine();
		$this->addSqlDelete();
		//FIM excluir
		
		
		//-------- FIM
		$this->addLine("}");
		$this->addLine("?>");
		if ($print) {
			echo $this->getLinesString();
		} else {
			return $this->getLinesString();
		}
	}

	//---------------------------------------------------------------------------------------
	public function saveDAO($fileName=null) {
	    
		$fileName = $this->path.(is_null($fileName) ? ucfirst($this->getTableName()).'DAO.class.php' : $tableName);
		if($fileName) {
			if( file_exists($fileName) ) {
				unlink($fileName);
			}
			file_put_contents($fileName,$this->showDAO(false));
		}
		
	}
	//--------------------------------------------------------------------------------------
	public  function getParams()
	{
		$cols = $this->getColumns();
		$qtd = count($cols);
		$result = '';
		for($i = 1; $i <= $qtd ; $i++)
		{
			if( $cols[$i-1] != $this->keyColumnName)
			{
				$result .= ($result=='') ? '' : ',';
				if( $this->bdType == 'POSTGRES' )
				{
					$result .= '$'.$i;
				}
				else
				{
					$result.='?';
				}
			}
		}
		return $result;

	}
	//--------------------------------------------------------------------------------------
	public  function removeUnderline($txt) {
		$len = strlen($txt);
		for ($i = $len-1; $i >= 0; $i--) {
			if ($txt{$i} === '_') {
				$len--;
				$txt = substr_replace($txt, '', $i, 1);
				if ($i != $len)
					$txt{$i} = strtoupper($txt{$i});
			}
		}
		return $txt;
	}
}
/*
$vo = new TGenerateDAO('usuario','id');
$vo->addColumn('id');
$vo->addColumn('cpf');
$vo->addColumn('nome');
//$vo->saveVO();
//$vo->showDAO(true);
$vo->saveDAO();
*/
?>