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

/**
 * Classe que faz varias transforma��es de data e hora
 * @author reinaldo.junior        
 */
class DateTimeHelper {
    const DEFAULT_TIME_ZONE = 'America/Sao_Paulo';
    
    /**
     * Getter para criar uma inst�ncia de um objeto do tipo DateTime.
     * @return DateTime
     */
    public static function getCurrentDateTime() {
        $dateTime = new DateTime();
        $dateTime->setTimezone(new DateTimeZone(self::DEFAULT_TIME_ZONE));
        
        return $dateTime;
    }
    
    /**
     *  Retorn Data e hora no formato 'Y-m-d H:i:s'
     * @return string 'Y-m-d H:i:s'
     */
    public static function getNow() {
        $dateTime = self::getCurrentDateTime();
        $retorno = $dateTime->format('Y-m-d H:i:s');
        return $retorno;
    }    
    
    /**
     * Converter data no formato dd/mm/yyyy para yyyy-mm-dd
     * @param string $dateSql
     * @return string
     */
    public static function date2Mysql($dateSql){
        $retorno = null;
        if(isset($dateSql) && ($dateSql<>'') ){
            $ano= substr($dateSql, 6);
            $mes= substr($dateSql, 3,-5);
            $dia= substr($dateSql, 0,-8);
            $retorno = $ano."-".$mes."-".$dia;
        }
        return $retorno;
    }
    
}