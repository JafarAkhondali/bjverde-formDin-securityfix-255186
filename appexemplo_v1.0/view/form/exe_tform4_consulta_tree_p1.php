<?php

$html1 = 'Esse form � um outra vis�o do form <i>"Mestre vis�o com Ajax"</i>.
          <br>
          <br>Este exemplo utiliza as tabelas tb_pedido e tb_pedido_item do banco de dados bdApoio.s3db ( sqlite )  ';

$primaryKey = 'ID_PEDIDO';
$frm = new TForm('Exemplo Form4 - Consulta Grid',600);
$frm->setFlat(true);
$frm->setMaximize(true);


$frm->addHiddenField( $primaryKey ); // coluna chave da tabela
$frm->addHtmlField('html1',$html1,null,null,null,null)->setCss('border','1px solid #ffeb3b')->setCss('background-color','#ffffcc')->setCss('margin-bottom','10px');
$frm->addDateField('data_pedido'		,'Data:',false);
$frm->addTextField('nome_comprador'		,'Comprador:',60,false,null);
$frm->addSelectField('forma_pagamento'	,'Forma Pagamento:',false,'1=Dinheiro,2=Cheque,3=Cart�o');
$frm->addTextField('QTD', 'Quantidade de Itens',50,false);

//$frm->addButton('Salvar', null, 'Salvar', null, null, true, false);
$frm->addButton('Limpar', null, 'Limpar', null, null, true, false);

$acao = isset($acao) ? $acao : null;
switch( $acao ) {
	case 'Salvar':
		if ( $frm->validate() ) {
			$vo = new Vw_pedido_qtd_itensVO();
			$frm->setVo( $vo );
			$resultado = Vw_pedido_qtd_itensDAO::insert( $vo );
			if($resultado==1) {
				$frm->setMessage('Registro gravado com sucesso!!!');
				$frm->clearFields();
			}else{
				$frm->setMessage($resultado);
			}
		}
	break;
	//--------------------------------------------------------------------------------
	case 'Limpar':
		$frm->clearFields();
	break;
	//--------------------------------------------------------------------------------
	case 'redirectForm4p2':
		//Redirect s� funciona se o arquivo estiver na pasta modulos
		$frm->redirect('view/form/exe_tform4_consulta_tree_p2.php',null,true);
		break;
}

$dados = Vw_pedido_qtd_itensDAO::selectAll($primaryKey);
$mixUpdateFields = $primaryKey.'|'.$primaryKey.',DATA_PEDIDO|DATA_PEDIDO,NOME_COMPRADOR|NOME_COMPRADOR,FORMA_PAGAMENTO|FORMA_PAGAMENTO,DES_FORMA_PAGAMENTO|DES_FORMA_PAGAMENTO,QTD|QTD';
$gride = new TGrid( 'gd'        // id do gride
				   ,'Gride'     // titulo do gride
				   ,$dados 	      // array de dados
				   ,null		  // altura do gride
				   ,null		  // largura do gride
				   ,$primaryKey   // chave primaria
				   ,$mixUpdateFields
				   );
$gride->addColumn($primaryKey,'id',50,'center');
$gride->addColumn('DATA_PEDIDO','Data',50,'center');
$gride->addColumn('NOME_COMPRADOR','Comprador',200,'center');
$gride->addColumn('DES_FORMA_PAGAMENTO','Forma Pagamento',100,'center');
$gride->addColumn('QTD','Qtd Itens',50,'center');

$gride->enableDefaultButtons(false);
$gride->addButton('Visualizar','redirectForm4p2','btnVisualizar');


$frm->addHtmlField('gride',$gride);

$frm->show();
?>