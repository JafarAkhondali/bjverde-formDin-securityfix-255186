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
class TRadio extends TOption
{
    /**
    * Classe para cria��o de campos do tipo RadioButtons, onde apenas uma op��o poder� ser selecionada
    *
    * @param string $strName
    * @param array $arrOptions
    * @param array $arrValues
    * @param boolean $boolRequired
    * @param integer $intQtdColumns
    * @param integer $intWidth
    * @param integer $intHeight
    * @param integer $intPaddingItems
    * @example RadioButtons.php
    * @return TEditRadio
    */
    public function __construct($strName,$arrOptions,$arrValues=null,$boolRequired=null,$intQtdColumns=null,$intWidth=null,$intHeight=null,$intPaddingItems=null)
    {
         parent::__construct($strName,$arrOptions,$arrValues,$boolRequired,$intQtdColumns,$intWidth,$intHeight,$intPaddingItems,false,'radio');
    }
    public function show($print=true)
    {
    	// se o controle etiver desativado, gerar um campo oculto com mesmo nome e id para n�o perder o post e
    	// renomear o input para "id"_disabled
    	if( ! $this->getEnabled() )
    	{
    		$value = $this->getValue();
   			$h = new THidden($this->getId());
   			if( $this->getRequired() )
   			{
   				$h->setProperty('needed','true');
			}
			if( isset($value[0] ) )
   			{
				$h->setValue($value[0]);
   			}
			$this->add($h);
		}
		return parent::show($print);
    }
}
/*
return;
for($i=0;$i<50;$i++)
{
	$arr[$i]= 'Opcao '.$i;
}
$radio = new TEditRadio('tip_bioma',$arr,null,true,10);
//$radio->setEnabled(false);

//$radio->setcss('color','red');
//$radio->setcss('font-size','18');
$radio->show();
*/
?>