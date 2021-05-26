<?php

namespace ImportExport\classes;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Interface IXlsxwriter：抽象
 * @package ImportExport\classes
 */
interface IXlsxwriter
{
    /**
     * 下载Excel
     * @param $fileName
     * @param bool $isGenerateFile
     * @return mixed
     */
    public function downloadExcel($fileName, $isGenerateFile = false);

    /**
     * 导出到Excel
     * @param $data
     * @param $header
     * @param bool $isWriteHeader
     * @param string $sheetName
     * @param array $other_options
     * @param Worksheet|null $worksheet
     * @return mixed
     */
    public function exportToExcel($data, $header, $isWriteHeader = false, $sheetName = 'Sheet1', $other_options = [], $worksheet = null);

    /**
     * 合并单元格
     * @param $sheetName
     * @param int $startRow
     * @param int $startCol
     * @param int $endRow
     * @param int $endCol
     * @return mixed
     */
    public function mergeCell($sheetName, $startRow = 0, $startCol = 0, $endRow = 0, $endCol = 0);
}