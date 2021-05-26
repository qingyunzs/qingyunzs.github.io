<?php

namespace ImportExport\classes;

use importExport\factory\ImportExport;

/**
 * PHP_XLSXWriter 操作类
 * @package IPhpspreadsheet\classes
 */
class XlsxwriterOperate extends OperateBase implements IXlsxwriter
{
    /**
     * 直接访问调用该属性
     * @var \XLSXWriter|null
     */
    protected $xlsxWriter = null;

    public function __construct()
    {
        parent::__construct();

        $this->xlsxWriter = new \XLSXWriter();
    }

    /**
     * @inheritDoc
     */
    public function downloadExcel($fileName, $isGenerateFile = false)
    {
        if ($isGenerateFile) {
            $file = $this->exportPath . $fileName;
            $this->xlsxWriter->writeToFile($file);
            return true;
        }

        ob_end_clean();
        // Redirect output to a client’s web browser (Excel2007)
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-disposition: attachment; filename="' . \XLSXWriter::sanitize_filename($fileName) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $this->xlsxWriter->writeToStdOut();
        exit(0);
    }

    /**
     * 导出到Excel
     * @param $data
     * @param $header
     * @param false $isWriteHeader 是否写入头部
     * @param string $sheetName Sheet名称
     * @param array $other_options 附加样式等
     * @param null $worksheet Worksheet
     * @return bool|mixed
     */
    public function exportToExcel($data, $header, $isWriteHeader = false, $sheetName = 'Sheet1', $other_options = [], $worksheet = null)
    {
        $col_options = $other_options['col_options'] ?? [];
        $row_options = $other_options['row_options'] ?? [];

        if (!$isWriteHeader) {
            // 写入表头
            $this->xlsxWriter->writeSheetHeader($sheetName, $header, $col_options);
            $isWriteHeader = true;
        }
        // 写入数据
        foreach ($data as $row) {
            $this->xlsxWriter->writeSheetRow($sheetName, $row, $row_options);
        }

        return $isWriteHeader;
    }

    /**
     * 合并单元格
     * @param $sheetName
     * @param int $startRow
     * @param int $startCol
     * @param int $endRow
     * @param int $endCol
     */
    public function mergeCell($sheetName, $startRow = 0, $startCol = 0, $endRow = 0, $endCol = 0)
    {
        $this->xlsxWriter->markMergedCell($sheetName, $startRow, $startCol, $endRow, $endCol);
    }
}