<?php
$frm = new TForm('Exemplo Gride Evento',300,500);

// simula��o de dados para o gride
$dados = null;
$dados['ID_TABELA'][] = 1;
$dados['NM_TABELA'][] = 'Linha1';
$dados['ST_TABELA'][] = 'S';
$dados['SIT_OPCOES'][] = '1=>Um,2=>Dois';

$dados['ID_TABELA'][] = 2;
$dados['NM_TABELA'][] = 'Linha2';
$dados['ST_TABELA'][] = 'S';
$dados['SIT_OPCOES'][] = '3=Tres,4=>Quatro';


$gride = new TGrid( 'gdTeste' // id do gride
					,'T�tulo do Gride' // titulo do gride
					,$dados 	// array de dados
					,null		// altura do gride
					,null		// largura do gride
					,'ID_TABELA'// chave primaria
					);

$gride->addCheckColumn('st_tabela','Selecione','ST_TABELA','NM_TABELA')->setEvent('onClick','chkClic()');
$gride->addColumn('nm_tabela','Nome',100,'left');
$gride->addSelectColumn('sit_opcoes' ,'Op��es','SIT_OPCOES','1=Amarelo,2=Verde');
$gride->addButton('Alterar 1', NULL, 'btnAlterar1', 'grideAlterar()', NULL, 'editar.gif','editar.gif', 'Alterar registro')->setEnabled( false );
$gride->addButton('Alterar 2', NULL, 'btnAlterar2', 'grideAlterar()', NULL, null,null, 'Alterar registro')->setEnabled( false );
$gride->addButton('Excluir', NULL, 'btnExcluir', 'grideAlterar()', NULL, null,null)->setEnabled( false )->setCss('color','red');

// fun��o de callback da cria��o das celulas
$gride->setOnDrawCell('gdAoDesenharCelula');

// campo html para exibir o gride
$frm->addHtmlField('gride',$gride);

// exibir o formul�rio
$frm->show();
function gdAoDesenharCelula($rowNum,$cell,$objColumn,$aData,$edit)
{
	if( $objColumn->getFieldName() == 'SIT_OPCOES')
	{
		$edit->setVisible( false );
	}

}
?>
<script>
function chkClic(e, linha)
{
	// mostrar o campo select
    if( jQuery(e).is(':checked') )
    {
    	jQuery("#sit_opcoes_"+linha).show();

    	// mostrar o bot�o alterar da linha
	    //jQuery("#gdteste_td_"+linha+" img").show(); // se tiver utilizando imagem
		//jQuery("#gdteste_td_"+linha+" button").show(); // se n�o estiver utilizando imagem
		jQuery("#gdteste_td_"+linha+" button").removeAttr('disabled');
		jQuery("#gdteste_td_"+linha+" img").removeAttr('disabled');
    }
    else // esconder o botao alterar e o  campo select
    {
    	jQuery("#sit_opcoes_"+linha).hide();
		//jQuery("#gdteste_td_"+linha+" img").hide(); // se tiver utilizando imagem
		//jQuery("#gdteste_td_"+linha+" button").hide(); // se n�o tiver utilizando imagem
		jQuery("#gdteste_td_"+linha+" button").attr('disabled','true');
		jQuery("#gdteste_td_"+linha+" img").attr('disabled','true');

    }
}

function grideAlterar(fields, values, idGride, linha)
{
	alert( 'Alterar..Linha: '+linha);
}

// esconder todos os botoes alterar ao iniciar o formul�rio
jQuery("[name=btnAlterar]").each(
  function()
  {
  	//jQuery(this).hide();
  	//jQuery(this).hide();
  }
)

</script>