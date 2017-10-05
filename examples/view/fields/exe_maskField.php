<?php

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
