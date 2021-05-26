<?php

namespace ImportExport\factory;

use ImportExport\classes\IPhpspreadsheet;
use ImportExport\classes\IXlswriter;
use ImportExport\classes\IXlsxwriter;
use importExport\classes\XlsxwriterOperate;

/**
 * Class XlsxwriterOperateFactory：具体工厂
 * GitHub https://github.com/mk-j/PHP_XLSXWriter
 * @package ImportExport\factory
 */
class XlsxwriterOperateFactory implements ImportExportFactory
{
    public function createXlsxwriterOperate(): IXlsxwriter
    {
        return new XlsxwriterOperate();
    }

    public function createPhpspreadsheetOperate(): IPhpspreadsheet
    {
        echo "No support!";
        die;
    }

    public function createXlswriterOperate(): IXlswriter
    {
        echo "No support!";
        die;
    }

}