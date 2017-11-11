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
error_reporting(E_ALL);
d($_REQUEST);

$frm= new TForm('Exemplo de Cria��o de Gride',450,900);
$frm->addTextField('nome','Nome:',20);
$frm->addCssFile($this->getBase() .'/js/jquery/tablesorter/themes/blue/formdin.css');
$frm->addCssFile('table.css');
$frm->addJsFile($this->getBase() .'/js/jquery/tablesorter/jquery.tablesorter.min.js');
$frm->addButton('Bot�o Teste',null,'btnTestar','alert("oi")',null,true,false)->setEnabled( false );
$frm->addButton('Bot�o Teste Habilitado',null,'btnTestar','alert("oi")',null,true,false);
$frm->addButtonAjax('Ajax Request desabilitado',null,null,null,'testar',null,null,null,null,null,null,false,false)->setEnabled( false );
$frm->addButtonAjax('Ajax Request Habilitado',null,null,null,'testar',null,null,null,null,null,null,false,false);
$frm->setcss('background-color','yellow');
$frm->setAutoSize(true);

// html dentro do form
$frm->addHtmlField('campo_gride');

// cria��o do array de dados
for( $i=0; $i<300; $i++ ){
	$res['SEQ_GRIDE'][] = ($i+1);
	//$res['NOM_LINHA'][] = print_r($_REQUEST,TRUE);//'Linha n� '. ($i+1);
	$res['NOM_LINHA'][] = 'Linha n� '. ($i+1);
	$res['DES_LINHA'][] = ($i+1).' '.str_repeat('Linha ',5);
	//$res['VAL_PAGO'][]  = str_pad($i,5,'0',STR_PAD_LEFT);
	$res['VAL_PAGO'][]  =  number_format(($i*54787/4),2,'.',',');
	$res['SIT_CANCELADO'][] = $i;
	$res['DES_AJUDA'][] = 'Ajuda - Este � o "texto" <B>que</B> ser� exibido quando o usu�rio posicionar o mouse sobre a imagem, referente a linha '.($i+1);
	$res['VAL_ZERO'][] = '0';
	$res['VAL_NULL'][] = NULL;

}

if( isset( $_REQUEST['idGride_serted_column'])) {
	$res = ordenarArrayBanco($res, strtoupper($_REQUEST['idGride_serted_column']),'SORT_ASC');
	/*
	if( $_REQUEST['idGride_sorted_column_order'] == 'down')
		$res = ordenarArrayBanco($res, strtoupper($_REQUEST['idGride_serted_column']),'SORT_DESC');
	else
		$res = ordenarArrayBanco($res, strtoupper($_REQUEST['idGride_serted_column']),'SORT_ASC');
		*/
}

//$res = ordenarArrayBanco($res, 'SEQ_GRIDE','SORT_DESC');

$gride = new TGrid( 'idGride' // id do gride
					,'T�tulo do Gride' // titulo do gride
					,$res 		// array de dados
					,null		// altura do gride
					,null		// largura do gride
					,'SEQ_GRIDE'
					,'VAL_PAGO,SIT_CANCELADO'
					,10
					,'grid/exe_gride01.php'
					,null
					);

$gride->setCss('background-clor','red');
$gride->setOnDrawCell('confGride');
$gride->setOnDrawActionButton('confButton');
//$gride->setOnDrawHeaderCell('confHeader');
$gride->setZebrarColors('#ffffff','#ffffff');

$gride->addColumn('seq_gride'	,'SEQ',100);
$gride->addColumn('nom_linha'	,'Nome',100)->setSortable(false);
$gride->addColumn('des_linha'	,'Descri��o',800);
$gride->addColumn('val_zero'	,'Zero',100);
$gride->addColumn('val_null'	,'Val Null',100);
$gride->addColumn('val_pago'	,'Valor',1000,'right');
$gride->addRadioColumn('sit_radio','Radio',null,'nom_linha')->setEvent('onClick','sit_marcado_click(this)',false);
$gride->addCheckColumn('sit_check','Checkbox',null,'nom_linha')->setEvent('onClick','sit_marcado_click(this)',false);

/*
$gride->setDisabledButtonImage('fwDisabled.png');
//$gride->addButton('Alterar','meu_gride_alterar','btnAlterar',null,null,'alterar.gif');
//$gride->addButton('Excluir','meu_gride_excluir','btnExcluir',null,null,'lixeira.gif');
//$gride->addButton('Fechar',null,'btnFechar',null,null,'search.gif');
$gride->addExcelHeadField('Nome:','nome');
//$gride->addButton('Cancelar', null, 'btnCancelar', 'btnCancelarClick();', 'Cofirma cancelamento?', 'imagens/icones/deletar1.png', null, 'Clique aqui para cancelar o registro');
//$gride->addButtonAjax('Ajax1','teste_ajax',null,null,'btnAjax1',null,'antesAjax','depoisAjax','text',null,null,null,null,null,array('meu_nome'=>'luis'));
$gride->addButtonAjax('Ajax','teste_botao_ajax',null,null
	,'btnAjax2',null,'antesAjax','depoisAjax','text','Criando Gride',null
	,false,null,null,array('cod_pessoa'=>'123456'))->setEnabled( false );


$gride->addButtonAjax('Ajax2','teste_botao_ajax','lixeira.gif',null
	,'btnAjax3',null,'antesAjax','depoisAjax','text','Criando Gride',null
	,false,null,null,array('cod_pessoa'=>'123456'))->setEnabled( false );

$gride->addButtonAjax('Ajax','teste_botao_ajax',null,null
	,'btnAjax4',null,'antesAjax','depoisAjax','text','Criando Gride',null
	,false,null,null,array('cod_pessoa'=>'123456'));


$gride->addButtonAjax('Ajax2','teste_botao_ajax','lixeira.gif',null
	,'btnAjax5',null,'antesAjax','depoisAjax','text','Criando Gride',null
	,false,null,null,array('cod_pessoa'=>'123456'));


$gride->addButton('Normal',null,'btnNormal1','alert("normal")');
$gride->addButton('Normal',null,'btnNormal2','alert("normal")',null,'lixeira.gif');

//$gride->addMemoColumn('memox', 'Observa��es','DES_LINHA', 2000, 50, 5,false)->addEvent( 'onBlur','opa()');
//$gride->addTextColumn('textx', 'Nome', 'NOM_LINHA', 20, 20)->addEvent( 'onBlur','opa()');
//$gride->addNumberColumn('val_pago','Valor Pago','VAL_PAGO',10,2,false)->addEvent( 'onchange','opa()');;
//$gride->addCheckColumn('chkTeste', 'V�lido','sit_cancelado');
//error_reporting(E_ALL);
//$gride->addCheckColumn('chk_num_pessoa','','SEQ_GRIDE','NOM_LINHA');
//$gride->addSelectColumn('seq_tipo','','SEQ_TIPO','1=Um,2=Dois');
//$gride->addCheckColumn('chkTeste', 'V�lido','sit_cancelado');

//$gride->addCheckColumn('colX','?','SEQ_GRIDE','NOM_LINHA')->addEvent('onclick','alert(this.id)');
//$gride->autoCreateColumns(); // cria as colunas de acordo com o array de dados
//$gride->setNoWrap(false);
*/

// quando for uma chamada ajax, devolver apenas o conteudo do gride, sem o formul�rio
if( isset($_REQUEST['ajax'] ) )
{
    if( $_REQUEST['formDinAcao']=='teste_botao_ajax')
    {
        //echo 'A��o:'.$_POST['formDinAcao'].'<br>Campos:'.$_POST['fields'].'<br>Valores:'.$_POST['values'];
        echo '<pre>';
       	print_r($_REQUEST );
        echo '</pre>';
        echo 'Clicked Row:'.$_POST['grid']['gdRownum'];
    }

    sleep(1);
    $gride->show();
    exit(0);
}

//error_reporting(E_ALL);
$frm->set('campo_gride', $gride ); // adiciona o objeto gride ao campo html
$frm->setAction('Atualizar');

$frm->addButton('Esconder Coluna A��o',null,'btnEsconder','fwGridHideColumn("idGride_action","idGride")');
$frm->addButton('Exibir Coluna A��o',null,'btnExibir','fwGridShowColumn("action","idGride")');

$frm->addButton('Esconder Coluna Nome ',null,'btnEsconderNome','fwGridHideColumn("nom_linha","idGride")');
$frm->addButton('Exibir Coluna Nome',null,'btnExibirNome','fwGridShowColumn("nom_linha","idGride")');

$frm->addButton('Esconder Colunas',null,'btnEsconderCols','fwGridHideColumn("nom_linha,des_linha","idGride")');
$frm->addButton('Exibir Colunas',null,'btnExibirCols','fwGridShowColumn("nom_linha,des_linha","idGride")');

$frm->addButton('Sort',null,'btnSort','aplicarSort()');
$frm->addJavascript('init()');
$frm->show();

function confHeader(TElement $th, TGridColumn $objColumn,TElement $objHeader)
{
	if( $objColumn->getFieldName() == 'nom_linha')
	{
		//echo $objColumn->getFieldName().',';
		$c = new TEdit('filtro_'.$objColumn->getFieldName(),null,10,false,10);
		$objHeader->clearChildren();
		$objHeader->add('<input type="button" value="X" style="z-index:10;">');
	}

}
function confButton($rowNum,TButton $button,$objColumn,$aData)
{
  if( $rowNum==2)
  {
  	//print_r($button);
    //print $button->getId().',';
    if ( $button->getId() == 'btnFechar')
    {
  		//$button->setEnabled(false);
  		//$button->setEvent('onMouseOver','alert(1)');
  		//$button->setEvent('onClick','alert(1)');
  		//print_r( $button->getEvents());
  		$button->clearEvents();
  		//$button->setAttribute('onclick','alert(8)');
  		$button->setEvent('onClick','alert("fechar")');

	}
	else
	{
		$button->setEnabled( false );
	}
  }

}
function confGride(  $rowNum,$cell,$objColumn,$aData, $edit)
{

		if( $aData['VAL_PAGO']==100)
		{
			if( $edit )
			{
				//NOM_LINHA,VAL_PAGO,sit_cancelado,
				//print $objColumn->getFieldName().',';
				if( $objColumn->getFieldName()=='sit_cancelado')
				{
					$edit->setProperty('disabled','true');
				}
			}
		}
		/*if( $objColumn->getFieldName()=='des_linha')
		{
			$img = '<img src="../imagens/ajuda.gif" toolTip="true" style="cursor:pointer;" title="'.htmlentities($aData['DES_AJUDA']).'">';
			$cell->add($img);
		}
		*/
		if( $objColumn->getFieldName()=='des_linha')
		{
			$img = new TElement('img');
			$img->setcss('cursor','pointer');
			$img->setAttribute('toolTip','true'); // para utiliza o hint modificado pelo jQuery
			$img->setAttribute('src',$img->getBase().'imagens/ajuda.gif');
			$img->setAttribute('title',preg_replace('/"/',htmlentities('"'),$aData['DES_AJUDA']) );
			$cell->add($img);
		}
}

?>
<script>
function init() {
    return;
	jQuery('body').bind('keydown', function() { cancelBack() } );
}

function opa(e,rownum)
	{
		alert(e.id+'\nLinha:'+rownum+'\nseq_linha:'+e.getAttribute('seq_gride'));
	}

    function cancelBack()
    {
        if ((event.keyCode == 8 ||
           (event.keyCode == 37 && event.altKey) ||
           (event.keyCode == 39 && event.altKey))
            &&
           (event.srcElement.form == null || event.srcElement.isTextEdit == false)
          )
        {
            event.cancelBubble = true;
            event.returnValue = false;
        }
    }
function aplicarSort() {
	jQuery("#idGride_table").tablesorter({
	 0: {
         sorter: false
     },
	 1: {
         sorter: false
     },
	});
}
function testeX(a,b,c) {
	alert( a );
}
function antesAjax() {
    alert( 'Antes ajax executado');
    jQuery("#btnTestar").get(0).disabled = false;
    return true;
}
function depoisAjax( res ){
	jQuery("#campo_gride").html( res );
}

function sit_marcado_click(e)
{
	if( e.checked )
	{
		alert( 'Marcado' );
	}
}
</script>