<?php
header('Content-disposition: attachment; filename=AutorizacaoConcursoCleaneo.docx');
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer"); 
header('Content-type:  application/msword');
ob_clean();
ob_end_flush();
readfile('AutorizacaoConcursoCleaneo.docx');
exit;
?>