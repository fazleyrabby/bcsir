<?php
include_once 'Sample_Header.php';

// New Word Document
//echo date('H:i:s'), ' Create new PhpWord object', EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();
//$section = $phpWord->addSection();

$section = $phpWord->addSection(
    array('marginLeft' => 790, 'marginRight' => 728,
        'marginTop' => 230, 'marginBottom' => 110)
);

$header = array('underline' => 'single', 'name' => 'Arial', 'size' => 13, 'bold' => true, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$comTitle = array('size' => 12, 'bold' => true,  'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$applicantPortion = array('name' => 'Arial', 'size' => 10, 'bold' => true);

$cellHCentered = array('valign' => 'center', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
// DAEWOO APPLICATION FORMAT

$section->addImage('../../../../resources/assets/images/daewoo.jpg', array('width' => 315, 'height' => 55, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
$textrun = $section->addTextRun($cellHCentered);
$textrun->addText('EVALUATION FORM', $header);

// Define styles
//$paragraphStyleName = 'pStyle';
//$phpWord->addParagraphStyle($paragraphStyleName, array('spacing' => 100));

$imageStyle = array(
    'width' => 118,
    'height' => 38,
    'wrappingStyle' => 'infront',
    'positioning' => 'absolute',
    //'posHorizontalRel' => 'margin',
    //'posVerticalRel' => 'line',
    'marginTop' => -50,
    'marginLeft' => 250,
);
$textrun = $section->addTextRun($cellHCentered);
$textrun->addText('(AGENCY:)', $comTitle);
$textrun->addImage('../../../../resources/assets/images/logo_doc.jpg', $imageStyle);
$textrun->addText('                           (Manispower Corporation)', $comTitle);

$empImageStyle = array(
    'width' => 100,
    'height' => 128,
    'wrappingStyle' => 'infront',
    'positioning' => 'relative',
    'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT,
    'posHorizontalRel' => 'margin',
    'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_VERTICAL_BOTTOM,
    'posVerticalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_LINE,
    //'posVerticalRel' => 'line',
    //'marginTop' => -100,
    //'marginRight' => 0,
);
$section->addImage('../../../../resources/assets/images/employee/101.jpg', $empImageStyle);

/*
$textrun = $section->addTextRun($cellHCentered);
$textrun->addText('(AGENCY:)', $comTitle);
$textrun->addImage('../../../../resources/assets/images/logo_doc.jpg', array('width' => 118, 'height' => 38, 'wrappingStyle' => 'behind'));
$textrun->addText('(Manispower Corporation)', $comTitle);
*/
//$section->addTextBreak(1);

$fancyTableStyleName = 'EVALUATION FORM';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000', 'cellMargin' => 120, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '000', 'bgColor' => 'DBE5F1');
$fancyTableCellStyle = array('valign' => 'center');
$valignCenter = array('valign' => 'center');
$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fancyTableFontStyle = array('bold' => true, 'valign' => 'center');
$tableCellStyle = array('bold' => true, 'valign' => 'center', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
//$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'DBE5F1');
//$cell1 = $table->addCell(2000, $cellRowSpan);
$table = $section->addTable($fancyTableStyleName);

//$section->addPageBreak();

$phpWord->addNumberingStyle(
    'multilevel',
    array(
        'type' => 'multilevel',
        'levels' => array(
            array('format' => 'decimal', 'text' => '◎', 'left' => 360, 'hanging' =>360, 'tabPos' => 220),
        ),
        'addFontStyle' => array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
    )
);
$section->addListItem('List Item I', 0, null, 'multilevel');

//$textrun = $section->addTextRun();
//$textrun->addText('◎', array('size' => 10, 'bold' => true));

$section->addListItem('Applicant\'s Portion (Please fill in the Blank)', 0, null, 'multilevel', $applicantPortion);
//$textrun->addText(' Applicant\'s Portion (Please fill in the Blank)', $applicantPortion);

$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000');
//$fancyTableStyle = array('borderTopSize' =>10, 'borderRightSize' =>10, 'borderBottomSize' =>10, 'borderLeftSize' =>10, 'borderSize' => 6, 'borderColor' => '000');
$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'DBE5F1');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
$cellColSpanBgColor2 = array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'DBE5F1');
$cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
$cellColSpanBgColor3 = array('gridSpan' => 3, 'valign' => 'center', 'bgColor' => 'DBE5F1');
$cellHCentered = array('bold' => true, 'valign' => 'center', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$cellVCentered = array('valign' => 'center');
$cellVCenteredBGColor = array('bold' => true, 'valign' => 'center', 'bgColor' => 'DBE5F1');
$tableCellStyle = array('bold' => true, 'valign' => 'center', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);

$textBold = array('bold' => true);
$spanTableStyleName = 'Colspan Rowspan';
$phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
$phpWord->setDefaultFontSize(7);
$phpWord->setDefaultFontName('Batang');
$table = $section->addTable($spanTableStyleName);

$table->addRow();
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('FULL NAME', $textBold);
$cell = $table->addCell(2000, $cellColSpan2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('');
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('JOB TITLE', $textBold);
$table->addCell(2000, $cellColSpan2)->addText('', null, $cellHCentered);

$table->addRow();
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('BIRTHDATE', $textBold);
$cell = $table->addCell(2000, $cellColSpan2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('(AGE :)');
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('MARITAL STATUS', $textBold);
$table->addCell(2000, $cellColSpan2)->addText('', null, $cellHCentered);

$table->addRow();
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('E-MAIL', $textBold);
$cell = $table->addCell(2000, $cellColSpan2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('Manispower2008@yahoo.com');
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('HEIGHT / WEIGHT', $textBold);
$cell = $table->addCell(2000, $cellColSpan2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('CM./ KG', $textBold);

$table->addRow();
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('EDUCATION', $textBold);
$cell2 = $table->addCell(2000, $cellColSpan2);
$textrun2 = $cell2->addTextRun($cellHCentered);
$textrun2->addText('Class:');
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('TEL NO / MOBILE NO', $textBold);
$cell = $table->addCell(2000, $cellColSpan2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('+88-', $textBold);

$table->addRow();
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('ADDRESS', $textBold);
$cell = $table->addCell(2000, $cellColSpan3);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('');
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('PASSPORT NO.', $textBold);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);


$table->addRow();
$cell1 = $table->addCell(2000, $cellRowSpan);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText('OVERSEAS WORK EXPERIENCE', $textBold);

//$table->addCell(2000, $cellRowSpan)->addText('E', null, $cellHCentered);

$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('PERIOD', $textBold);
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('COMPANY', $textBold);
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('PROJECT', $textBold);
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('COUNTRY', $textBold);
$cell = $table->addCell(2000, $cellVCenteredBGColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('JOB TITLE', $textBold);

$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);


$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);


$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);


$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);


$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);


$section->addText('◎ Pre-Screener\'s Portion', $applicantPortion);

$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '999999');
$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'DBE5F1');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$cellVCentered = array('valign' => 'center');

$spanTableStyleName = 'Colspan Rowspan';
$phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
$table = $section->addTable($spanTableStyleName);

$table->addRow();

$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('AGE', $textBold);
$table->addCell(2000, array('vMerge' => 'restart'))->addText('');
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('EDUCATION', $textBold);
$table->addCell(2000, array('vMerge' => 'restart'))->addText('');
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('EXPERIENCE', $textBold);
$cell = $table->addCell(1500);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('LOCAL', $textBold);
$cell = $table->addCell(1500);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('OVERSEAS', $textBold);
$cell = $table->addCell(1500);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('TOTAL', $textBold);

$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(null, $cellRowContinue);
$table->addCell(null, $cellRowContinue);
$table->addCell(null, $cellRowContinue);
$table->addCell(null, $cellRowContinue);
$table->addCell(1500, $cellVCentered)->addText('');
$table->addCell(1500, $cellVCentered)->addText('');
$table->addCell(1500, $cellVCentered)->addText('');

$table->addRow();
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('RESUME', $textBold);
$table->addCell(2000, $cellColSpan3)->addText('GENUINE / COUNTERFEIT', NULL, $cellHCentered);
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('CERTIFICATE& LICENSE', $textBold);
$table->addCell(2000, $cellColSpan3)->addText('GENUINE / COUNTERFEIT', NULL, $cellHCentered);

$table->addRow();
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('OPINION', $textBold);
$table->addCell(2000, array('gridSpan' => 7))->addText('');

$table->addRow();
$table->addCell(2000, array('gridSpan' => 8))->addText(' I VERIFY THAT ALL THE ABOVE ARE TRUE AND CORRECT.PRE-SCREENER\'S SIGNATURE :');


$section->addText('◎ Interviewer\'s Portion', $applicantPortion);

$spanTableStyleName = 'Colspan Rowspan';
$phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
$table = $section->addTable($spanTableStyleName);
$cellBgColor =  array('bgColor' => 'DBE5F1');

$table->addRow();
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('PRACTICAL & PHYSICAL TEST', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('SKILL', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('THEORY', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('ENGLISH', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('PERSONALITY', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('SINCERITY', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('HEALTH', $textBold);

$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(1500)->addText('SABCD', NULL, $cellHCentered);
$table->addCell(1500)->addText('SABCD', NULL, $cellHCentered);
$table->addCell(1500)->addText('SABCD', NULL, $cellHCentered);
$table->addCell(1500)->addText('SABCD', NULL, $cellHCentered);
$table->addCell(1500)->addText('SABCD', NULL, $cellHCentered);
$table->addCell(1500)->addText('SABCD', NULL, $cellHCentered);

$table->addRow();
$table->addCell(null, $cellRowContinue);
$cell = $table->addCell(1500, $cellColSpanBgColor2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('RESULT', $textBold);
$cell = $table->addCell(1500, $cellColSpanBgColor2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('FINAL GRADE', $textBold);
$cell = $table->addCell(1500, $cellColSpanBgColor2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('NAME / SIGN', $textBold);

$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(1500, $cellColSpan2)->addText('Pass / Fail', NULL, $cellHCentered);
$cell = $table->addCell(1500, $cellColSpan2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('S A B C D', $textBold);
$table->addCell(1500, $cellColSpan2)->addText('');

$table->addRow();
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('SALARY', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('REQUEST', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('OFFER', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('AGREED', $textBold);
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('FINALRESULT', $textBold);
$cell = $table->addCell(1500, $cellColSpanBgColor2);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('NAME/SIGN', $textBold);

$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(1500)->addText('$');
$table->addCell(1500)->addText('$');
$table->addCell(1500)->addText('$');
$cell = $table->addCell(1500, $cellBgColor);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('PASS / FAIL', $textBold);
$table->addCell(1500, $cellColSpan2)->addText('');

$table->addRow();
$cell = $table->addCell(2000, $cellRowSpan);
$textrun = $cell->addTextRun($cellHCentered);
$textrun->addText('INTERVIEWER\'S OPINION (상세한글 기재)', $textBold);
$table->addCell(1500, array('gridSpan' => 6))->addText('');


// Add text run
$paragraphStyleArialName8 = array('name' => 'Arial', 'size' => 8);
$paragraphStyleArialName6 = array('name' => 'Arial', 'size' => 6, 'cellMargin' => 600);
$textrun = $section->addTextRun($paragraphStyleArialName8);
$textrun->addText('* The RESULT / EVALUATION cell shall be effective when it is signed by interviewer.', $paragraphStyleArialName8);

$section->addText('◎ Affidavit of Interviewee', $applicantPortion);
$spanTableStyleName = 'Colspan Rowspan';
$phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
$table = $section->addTable($spanTableStyleName);
$cellBgColor =  array('bgColor' => 'DBE5F1');

$table->addRow();
$table->addCell(14000, array('marginTop' => 80))->addText('I, ______________________________, COMMIT MYSELF TO ABIDE BY AND COMPLY WITH ALL THE PROVISIONS OF THE EMPLOYMENT CONTRACT THAT WILL BE COME INTO EFFECT IF SIGNED. I ALSO AGREE ON THE ABOVE SALARY OFFER GIVEN TO ME AND WILL NOT HAVE ANY CLAIM ABOUT THAT AFTER SIGNING ON THIS EVALUATION FORM.
 _____________________  SIGNATURE OF APPLICANT', $paragraphStyleArialName6);

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}