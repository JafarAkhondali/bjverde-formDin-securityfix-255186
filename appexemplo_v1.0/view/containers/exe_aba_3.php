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

$primaryKey = 'IDPESSOA';
$frm = new TForm('Exemplo - Utiliza��o de Abas 03',600);
$frm->setFlat(true);
$frm->setMaximize(true);

$pc = $frm->addPageControl('pc',100,null,null,null);

$pc->addPage('Cadastro pessoa',true,true,'pessoa',null);
	$frm->addHiddenField( $primaryKey ); // coluna chave da tabela
	$frm->addTextField('NMPESSOA', 'Nome da Pessoa',50,true);
	$frm->addSelectField('TPPESSOA', 'Tipo Pessoa:',null,'F=Pessoa f�sica,J=Pessoa jur�dica',false)->addEvent('onChange','select_change(this)');;

$pc->addPage('Pessoa F�sica',false,true,'pessoaFisica',true,true);
	$frm->addCpfField('NMCPF','CPF:',false);
	$frm->addTextField('IDUF', 'UF',50,false);
	$frm->addTextField('IDESTADOCIVIL', 'Estado Civil',50,false);
	$frm->addTextField('IDNACIONALIDADE', 'Nacionalidade',50,false);


$pc->addPage('Pessoa Jur�dica',false,true,'pessoaJuridica',true,true);
	$frm->addCnpjField('NMCNPJ','CNPJ:',false);

$frm->closeGroup();
$frm->addButton('Salvar','Salvar');
$frm->addButton('Limpar','Limpar');


$acao = isset($acao) ? $acao : null;
switch( $acao ) {
	case 'Salvar':
		$frm->validate();
		/*
		 $TPPESSOA = $frm->get('TPPESSOA');
		 if ( $TPPESSOA == 'F' ) {
		 $frm->validate(null,null,'NMCNPJ');
		 }else{
		 $frm->validate(null,null,'NMCPF');
		 }
		 $frm->validate();
		 */
		/*
		 if ( $TPPESSOA == 'F' ) {
		 $vo = new PessoaVO();
		 $frm->setVo( $vo );
		 $resultado = PessoaDAO::insert( $vo );
		 if($resultado==1) {
		 $frm->setMessage('Registro gravado com sucesso!!!');
		 $frm->clearFields();
		 }else{
		 $frm->setMessage($resultado);
		 }
		 }
		 */
		break;
		//--------------------------------------------------------------------------------
	case 'Limpar':
		$frm->clearFields();
		break;
		//--------------------------------------------------------------------------------
	case 'gd_excluir':
		$id = $frm->get( $primaryKey ) ;
		//$resultado = PessoaDAO::delete( $id );;
		if($resultado==1) {
			$frm->setMessage('Registro excluido com sucesso!!!');
			$frm->clearFields();
		}else{
			$frm->clearFields();
			$frm->setMessage($resultado);
		}
		break;
}

function incluirPessoa($dadosPessoa, $id, $nome, $tipo, $cpf, $cnpj){
	$dadosPessoa['IDPESSOA'][]=$id;   $dadosPessoa['NMPESSOA'][]=$nome;
	$dadosPessoa['TPPESSOA'][]=$tipo; $dadosPessoa['NMCPF'][]=$cpf;
	$dadosPessoa['NMCNPJ'][]=$cnpj;
	
	return $dadosPessoa;
}

$dadosPessoa = isset($dadosPessoa) ? $dadosPessoa : null;
$dadosPessoa = incluirPessoa($dadosPessoa, 1, 'Joao Silva', 'F', '123456789', null);
$dadosPessoa = incluirPessoa($dadosPessoa, 2, 'Maria Laranja', 'F', '52798074002', null);
$dadosPessoa = incluirPessoa($dadosPessoa, 3, 'Dell', 'J', null, '72381189000110');

$mixUpdateFields = $primaryKey.'|'.$primaryKey.',NMPESSOA|NMPESSOA,TPPESSOA|TPPESSOA,NMCPF|NMCPF,NMCNPJ|NMCNPJ';
$gride = new TGrid( 'gd'        // id do gride
		,'Gride'     // titulo do gride
		,$dadosPessoa            // array de dados
		,null                  // altura do gride
		,null                  // largura do gride
		,$primaryKey   // chave primaria
		,$mixUpdateFields
		);
$gride->addColumn($primaryKey,'id',50,'center');
$gride->addColumn('NMPESSOA','Nome',50,'center');
$gride->addColumn('TPPESSOA','Tipo',50,'center');
$gride->addColumn('NMCPF','CPF',13,'center');
$gride->addColumn('NMCNPJ','CNPJ',15,'center');
$frm->addHtmlField('gride',$gride);
//$frm->setAction( 'Salvar,Limpar' );
$frm->show();
?>
<script>

function select_change(e) {
        if( e.id == 'TPPESSOA'){
                var valor = jQuery("#"+e.id).find(":selected").val();
                if (valor=='F'){
                        fwHabilitarAba('pessoaFisica','pc');
                        fwSelecionarAba('pessoaFisica');
                        fwDesabilitarAba('pessoaJuridica');
                        jQuery("#NMCPF").prop("needed", true);
                }else{
                        fwHabilitarAba('pessoaJuridica','pc');
                        fwSelecionarAba('pessoaJuridica');
                        fwDesabilitarAba('pessoaFisica');
                }
        }
}
</script>