<?php
/*
 * Formdin Framework
 * Copyright (C) 2012 Ministério do Planejamento
 * Criado por Luís Eugênio Barbosa
 * Essa versão é um Fork https://github.com/bjverde/formDin
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
 * Este arquivo é parte do Framework Formdin.
 *
 * O Framework Formdin é um software livre; você pode redistribuí-lo e/ou
 * modificá-lo dentro dos termos da GNU LGPL versão 3 como publicada pela Fundação
 * do Software Livre (FSF).
 *
 * Este programa é distribuído na esperança que possa ser útil, mas SEM NENHUMA
 * GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer MERCADO ou
 * APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/LGPL em português
 * para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da GNU LGPL versão 3, sob o título
 * "LICENCA.txt", junto com esse programa. Se não, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Fundação do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */

$html = '<br><br><b>Regra de Negocio</b>'
        .'<br>Passe o mouse no balões de ajuda e descubra a regra';

$frm = new TForm('Exemplo Campo Hora');
$frm->addHtmlField('texto', $html)->setCss('border', '1px solid red');
$frm->addTextField('nom_pessoa', 'Nome:', 50, false)->setEnabled(false);
$fld = $frm->addTimeField('hor_entrada', 'Hora Entrada:', true, '05:00', '23:00', '99:99');
$fld->setToolTip('Hora no formato HH:MM entre 05:00 e 23:00');
$frm->addTimeField('hor_inicio2', 'Hora:', false, '12:00:00', '15:00:00', 'HMS')->setToolTip('Hora no formato HH:MM:SS entre 12:00 e 15:00');
$frm->addButton('Validar', 'validar', 'btnValidar');

$acao = isset($acao) ? $acao : null;
if ($acao=='validar') {
    if ($frm->validate()) {
        $frm->setMessage('Dados Ok');
    }
}
$frm->show();
