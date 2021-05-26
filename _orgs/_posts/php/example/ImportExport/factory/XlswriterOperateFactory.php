<?php

namespace ImportExport\factory;

use ImportExport\classes\IPhpspreadsheet;
use ImportExport\classes\IXlswriter;
use ImportExport\classes\IXlsxwriter;
use importExport\classes\XlswriterOperate;

/**
 * XLSWriter Factory：具体工厂
 * GitHub https://github.com/viest/php-ext-xlswriter
 * 官方文档 https://xlswriter-docs.viest.me/
 * @package IPhpspreadsheet\factory
 */
class XlswriterOperateFactory implements ImportExportFactory
{
    public function createXlswriterOperate(): IXlswriter
    {
        return new XlswriterOperate();
    }

    public function createPhpspreadsheetOperate(): IPhpspreadsheet
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