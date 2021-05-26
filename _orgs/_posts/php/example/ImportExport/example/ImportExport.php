<?php

namespace ImportExport;

use ImportExport\factory\PhpspreadsheetOperateFactory;
use ImportExport\factory\XlswriterOperateFactory;
use ImportExport\factory\XlsxwriterOperateFactory;

$phpspreadsheet = (new PhpspreadsheetOperateFactory())->createPhpspreadsheetOperate();

$xlswriter = (new XlswriterOperateFactory())->createXlswriterOperate();

$xlsxwriter = (new XlsxwriterOperateFactory())->createXlsxwriterOperate();