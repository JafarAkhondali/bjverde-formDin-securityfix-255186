<?php
class info {
    
    static function infoSQLServer(){
        if(PHP_OS == "Linux"){
            $msg = "Para utilizar Linux com Microsoft SQL Server ser� utilizado o PDO com o drive dblib";
        }else{
            switch(PHP_INT_SIZE) {
                case 4:
                    $msg = 'Para utilizar Windows com Microsoft SQL Server utilize o PDO com o drive sqlsrv';
                    break;
                case 8:
                    $msg = '<span class="vermelho">ATEN��O o Drive da Microsoft n�o funciona em Windows 64 bits</span>, instale o drive n�o oficial';
                    break;
                default:
                    $msg  = 'PHP_INT_SIZE is ' . PHP_INT_SIZE;
            }
        }
        return $msg;
    }
    
    static function phpVersionOK(){
        $texto = '<b>Vers�o do PHP</b>: ';
        if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
            $texto =  $texto.'<span class="verde">'.phpversion().'</span><br>';
        }else{
            $texto =  $texto.'<span class="vermelho">'.phpversion().' atualize seu sistema para o PHP 5.4.0 ou seperior </span><br>';
        }
        return $texto;
    }
}
?>