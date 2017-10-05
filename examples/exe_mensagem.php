<?php

/*
 * Formdin Framework
 * Copyright (C) 2012 Minist�rio do Planejamento
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
error_reporting(E_ALL);
$frm = new TForm('Exemplo Mensagem',200,900);
//$frm->setOverflowY(false);
//$frm->setFlat(true);

$frm->addTextField('nome','Nome:',30);
$frm->addMessageField('msg_local');
$frm->addError('Mensagem de erro utilizando o m�todo addErro() da TForm');
$frm->setPopUpMessage('Mensagem Utilizando o metodo setPopUpMessage da TForm',5,'sucess');
$frm->setAction('Refresh,Mensagem1,Mensagem2,Mensagem3,Mensagem4,Mensagem5,Confirma��o1,Confirma��o2,Popup1,Popup2,Popup3');
$frm->show();
?>
<script>
function btnMensagem1OnClick()
{
	fwShowMessage('Mensagem no form utilizando a funcao fwShowMessage<br>Linha2<br>Linha3<br>linha4...');
}
function btnMensagem2OnClick()
{
 	fwShowMessage({message:"Mensagem de erro no form","status":0});
}
function btnMensagem3OnClick()
{
 	fwShowMessage({message:"Mensagem de erro com alert","status":0,"alert":1});
}

function btnMensagem4OnClick()
{
	fwDialog( "Janela Dialogo",'Http://localhost',600,800);
}
function btnMensagem5OnClick()
{
     fwShowMessage({message:"Mensagem em local especifico<br>Linha2<br>linha3","containerId":"msg_local"});

}
function btnConfirmacao1OnClick()
{
    // caixa de confirma��o com um callback �nico para sim ou n�o
    fwConfirm("Mensagem de confirma��o",function(r)
        {
            if( r )
            {
                alert('Sim');
            }
            else
            {
                alert('N�O');
            }

    });
}

function btnConfirmacao2OnClick()
{
    // caixa de confirma��o com um callback �nico para sim ou n�o
    fwConfirm("Mensagem de confirma��o"
        ,function() // YES
        {
            alert( 'fun��o de callback SIM foi executada!');
        }
        ,function(r) // NO
        {
            alert( 'fun��o de callback N�O foi executada!');
        }
        ,'Concordo','N�o Concordo','T�tulo da Mensagem'


    );
}
function btnPopup1OnClick()
{
	parent.app_show_message("Mensagem Erro, Utilizando o metodo setPopUpMessage da TForm","error","5");
}
function btnPopup2OnClick()
{
	parent.app_show_message("Mensagem Sucesso, Utilizando o metodo setPopUpMessage da TForm","sucess","5");
}
function btnPopup3OnClick()
{
	parent.app_show_message("Mensagem Sucesso, Utilizando o metodo setPopUpMessage da TForm","attention","5");
}
</script>
