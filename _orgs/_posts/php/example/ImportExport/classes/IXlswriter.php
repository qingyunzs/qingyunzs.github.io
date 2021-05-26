<?php

namespace ImportExport\classes;

/**
 * Interface IXlswriter：抽象
 * @package ImportExport\classes
 */
interface IXlswriter
{
    /**
     * 读取Excel
     * @param string $fileName 文件名称
     * @param bool $skipFirstRow 是否跳过首行
     * @param array $other_options 其它配置
     * @return array
     */
    public function readExcel($fileName, $skipFirstRow = false, $other_options = []): array;

    /**
     * 读取Csv
     * @param string $fileName
     * @param bool $skipFirstRow
     * @return array
     */
    public function readCsv($fileName, $skipFirstRow = false): array;

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
}