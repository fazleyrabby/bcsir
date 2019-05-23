<?php
//require_once '../bootstrap.php';
require_once 'Sample_Header.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();

$section->addImage('../../../../resources/assets/images/daewoo.jpg', array('width' => 315, 'height' => 55, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
$section->addImage('../../../../resources/assets/images/logo_doc.jpg', array('width' => 118, 'height' => 38));

/*header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="test.docx"');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');*/

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}
?>