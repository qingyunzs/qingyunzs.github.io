<?php

namespace ImportExport\factory;

use ImportExport\classes\IPhpspreadsheet;
use ImportExport\classes\IXlswriter;
use ImportExport\classes\IXlsxwriter;

/**
 * Interface ImportExportFactory：抽象工厂
 * @package ImportExport\factory
 */
interface ImportExportFactory
{
    public function createPhpspreadsheetOperate(): IPhpspreadsheet;

    public function createXlswriterOperate(): IXlswriter;

    public function createXlsxwriterOperate(): IXlsxwriter;
}