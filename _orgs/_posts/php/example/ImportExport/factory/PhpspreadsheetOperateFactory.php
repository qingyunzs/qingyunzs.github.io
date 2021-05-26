<?php

namespace ImportExport\factory;

use ImportExport\classes\IPhpspreadsheet;
use ImportExport\classes\IXlswriter;
use ImportExport\classes\IXlsxwriter;
use importExport\classes\PhpspreadsheetOperate;

/**
 * Phpspreadsheet Factory：具体工厂
 * https://phpspreadsheet.readthedocs.io/
 * @package IPhpspreadsheet\factory
 */
class PhpspreadsheetOperateFactory implements ImportExportFactory
{
    public function createPhpspreadsheetOperate(): IPhpspreadsheet
    {
        return new PhpspreadsheetOperate();
    }

    public function createXlswriterOperate(): IXlswriter
    {
        echo "No support!";
        die;
    }

    public function createXlsxwriterOperate(): IXlsxwriter
    {
        echo "No support!";
        die;
    }
}