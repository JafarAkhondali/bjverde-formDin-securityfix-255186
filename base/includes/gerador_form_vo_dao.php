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

function verifyPath($path){
    $diretorio = str_replace('//','/',$path.'/');
    @mkdir($diretorio,"775",true);
    if( ! file_exists( $diretorio ) ) {
        $diretorio = 0;
    }
    return $diretorio;
}


$frm = new TForm('Gerador de From, VO e DAO',650,700);
$frm->setFlat(true);
$frm->addGroupField('gpx1','Informa��es do form');
$frm->addTextField('form_title','T�tulo do formulario:',50,true,50);
$frm->addTextField('form_dir','Diret�rio do formul�rio:',50,true,150,'modulos/');
$frm->addTextField('form_name','Nome do arquivo formulario:',50,true,50);
$frm->closeGroup();
$frm->addGroupField('gpxE','Informa��es do Esquema');
$frm->addHtmlField('html','Em alguns bancos como o MS SQL Server a informa��o do esquema � nescessaria para as intru��es de banco. SE Marcar a op��o SIM nas DAOs ser� incluido a constante SCHEME antes do nome da tabela.',null,null,50)->setCss('border','1px solid blue');
$frm->addSelectField('sit_const_schema','Constante Esquema:',null,'0=N�o,1=Sim',null,null,'0');
$frm->closeGroup();
$frm->addGroupField('gpx2','Informa��es do VO e DAO');
$frm->addTextField('diretorio','Diret�rio:',50,true);
$frm->addTextField('tabela','Nome da Tabela:',30,true);
$frm->addTextField('coluna_chave','Nome da Coluna Chave:',30);
$frm->addMemoField('colunas','Colunas:',5000,true,45,20);
$frm->closeGroup();

$frm->setAction('Gerar');

if(!$frm->get('diretorio')) {
    $frm->set('diretorio','dao/');
}

$acao = ( isset($acao) ) ? $acao : '';
switch( $acao ) {
    case 'Gerar':
        if( $frm->validate() ) {
            $diretorio = str_replace('//','/',$frm->get('diretorio').'/');
            @mkdir($diretorio,"775",true);
            if( ! file_exists( $diretorio ) ) {
                $frm->setMessage('Diret�rio '.$diretorio.' n�o existe!');
                break;
            }
            $txt = preg_replace('/'.chr(13).'/',',',$frm->get('colunas'));
            $txt = preg_replace('/'.chr(10).'/',',',$txt);
            $txt = preg_replace('/\,\,/',',',$txt);
            $txt = preg_replace('/ /','',$txt);
            $txt = preg_replace('/\,\,/',',',$txt);
            if( substr($txt,-1) ==',') {
                $txt=substr($txt,0,strlen($txt)-1);
            }
            $listColumns = explode(',',$txt);
            $coluna_chave = $frm->get('coluna_chave') ? $frm->get('coluna_chave') : $listColumns[0];
            $gerador = new TDAOCreate($frm->get('tabela'), $coluna_chave, $diretorio);
            foreach($listColumns as $k=>$v) {
                $gerador->addColumn($v);
            }
            $showSchema = $frm->get('sit_const_schema');
            $gerador->setShowSchema($showSchema);
            $gerador->saveVO();
            $gerador->saveDAO();
            
            $diretorio = str_replace('//','/',$frm->get('form_dir').'/');
            @mkdir($diretorio,"775",true);
            if( ! file_exists( $diretorio ) ) {
                $frm->setMessage('Diret�rio '.$diretorio.' n�o existe!');
                break;
            }
            
            $geradorForm = new TFormCreate();
            $geradorForm ->setFormTitle( $frm->get('form_title') );
            $geradorForm ->setFormPath( $diretorio );
            $geradorForm ->setFormFileName($frm->get('form_name'));
            $geradorForm ->setPrimaryKeyTable($frm->get('coluna_chave'));
            $geradorForm ->setTableRef($frm->get('tabela'));
            $geradorForm ->setListColunnsName($listColumns);
            $geradorForm ->saveForm();
            $frm->setMessage('Fim');
        }
        break;
}

$frm->show();
?>