<?php

namespace ImportExport\classes;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PhpspreadsheetOperate extends OperateBase implements IPhpspreadsheet
{

    /**
     * Spreadsheet 类对象
     * @var \PhpOffice\PhpSpreadsheet\Spreadsheet|null
     */
    protected $spreadsheet = null;

    public function __construct()
    {
        parent::__construct();

        $this->spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    }

    /**
     * @inheritDoc
     */
    public function addWorksheet($sheetName, $sheetIndex): Worksheet
    {
        $worksheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($this->spreadsheet, $sheetName);
        $this->spreadsheet->addSheet($worksheet, $sheetIndex);
        return $worksheet;
    }

    /**
     * @inheritDoc
     */
    public function readExcel($fileName, $skipFirstRow = false, $other_options = []): array
    {
        // TODO: Implement readExcel() method.
        // 待完善
    }

    /**
     * @inheritDoc
     */
    public function readCsv($fileName, $skipFirstRow = false): array
    {
        // TODO: Implement readCsv() method.
        // 待完善
    }

    /**
     * @inheritDoc
     */
    public function downloadExcel($fileName, $isGenerateFile = false)
    {
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($this->spreadsheet, 'Xlsx');
        if ($isGenerateFile) {
            $file = $this->exportPath . $fileName;
            $writer->save($file);
            return true;
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    /**
     * @inheritDoc
     */
    public function exportToExcel($data, $header, $isWriteHeader = false, $sheetName = 'Sheet1', $other_options = [], $worksheet = null)
    {
        $worksheet = $worksheet ?? $this->spreadsheet->getActiveSheet();
        // 设置 Sheet 名称
        $worksheet->setTitle($sheetName);
        // 设置表头
        for ($i = 65; $i < count($header) + 65; $i++) {
            $worksheet->setCellValue(strtoupper(chr($i)) . '1', $header[$i - 65]);
        }
        // 写入数据
        $row = empty($header) ? 1 : 2; // 如果没有表头从第一行开始写入，否则从第二行开始写入
        foreach ($data as $key => $item) {
            $values = array_values($item);
            for ($i = 65; $i < count($values) + 65; $i++) {
                $worksheet->setCellValue(strtoupper(chr($i)) . ($key + $row), $values[$i - 65]); // $key = $i - 65
            }
        }

        // 样式设置
        if (!empty($other_options)) {
            $this->setExcelStyle($worksheet, $other_options);
        }
    }

    /**
     * Excel样式设置
     * @param Worksheet $worksheet
     * @param array $options
     */
    public function setExcelStyle($worksheet, $options)
    {
        // 宽度设置
        $widths = $options['width'];
        // 单元格文字居中
        $align_center = $options['align_center'];
        // 单元格字体颜色
        $font_color = $options['font_color'];
        // 单元格填充颜色
        $cell_fill_color = $options['cell_fill_color'];
        // 合并单元格
        $merge_cells = $options['merge_cells'];
        // 取消合并单元格
        $unmerge_cells = $options['un_merge_cells'];
        // 下拉选择框设置
        $drop_down_list = $options['drop_down_list'];

        /**
         * 宽度设置
         * @var $width
         * 示例：
         * [
         *  'A' => 30,
         *  'B' => 20,
         *  'C' => 50
         * ]
         */
        if (!empty($widths)) {
            foreach ($widths as $key => $value) {
                $worksheet->getColumnDimension($key)->setWidth($value);
            }
        }

        /**
         * 表头单元格居中
         * @var $align_center
         * 示例：
         * [
         *  'A1:D1',
         *  'A2:A10'
         * ]
         */
        if (!empty($align_center)) {
            foreach ($align_center as $value) {
                $worksheet->getStyle($value)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $worksheet->getStyle($value)->getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER);
            }
        }

        /**
         * 单元格字体颜色
         * @var $font_color
         */
        if (!empty($font_color)){
            foreach ($font_color as $key=>$value){
                $worksheet->getStyle($key)->getFont()->getColor()->setARGB($value);
            }
        }

        /**
         * 表头单元格颜色
         * @var $cell_fill_color
         * 示例：
         * [
         *  'A1:D1' => 'ffffff'
         * ]
         */
        if (!empty($cell_fill_color)) {
            foreach ($cell_fill_color as $key => $value) {
                $worksheet->getStyle($key)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($value);
            }
        }

        /**
         * 合并单元格
         * @var $merge_cells
         */
        if (!empty($merge_cells)) {
            foreach ($merge_cells as $key => $value) {
                $worksheet->mergeCells($value);
            }
        }

        /**
         * 取消合并单元格
         * @var $merge_cells
         */
        if (!empty($unmerge_cells)) {
            foreach ($unmerge_cells as $key => $value) {
                $worksheet->mergeCells($value);
            }
        }

        /**
         * 下拉选择框设置
         * 包含参数：
         * 1 position 下拉选择框显示位置
         * 2 sources 下拉选择来源 如：Sheet2!$A$2:$A$8
         * 3 position_is_dynamic 显示位置是否固定，如果不是，下拉选择框显示位置需要动态循环拼接，并且需要参数8
         * 4 max_number 最大数
         * 5 is_has_header 是否跳过头部
         */
        if (!empty($drop_down_list)) {
            if (isset($drop_down_list['position_is_dynamic'])) {
                $is_has_header = $drop_down_list['is_has_header'] ?? false;
                $counts = $is_has_header ? ($drop_down_list['max_number'] + 1) : $drop_down_list['max_number'];
                $i = $is_has_header ? 2 : 1;
                for ($i; $i <= $counts; $i++) {
                    $validation = $this->spreadsheet->getActiveSheet()->getCell($drop_down_list['position'] . $i)->getDataValidation();
                    $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                    $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                    $validation->setAllowBlank(false);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setShowDropDown(true);
                    $validation->setErrorTitle('输入错误');
                    $validation->setError('值不在列表中');
//                    $validation->setPromptTitle('从列表中选择');
//                    $validation->setPrompt('请从列表中选择');
                    $validation->setFormula1($drop_down_list['sources']);
                }
            } else {
                $validation = $this->spreadsheet->getActiveSheet()->getCell($drop_down_list['position'])->getDataValidation();
                $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('输入错误');
                $validation->setError('值不在列表中');
//                $validation->setPromptTitle('从列表中选择');
//                $validation->setPrompt('请从列表中选择');
                $validation->setFormula1($drop_down_list['sources']);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getCurrentWorksheet()
    {
        return $this->spreadsheet->getActiveSheet();
    }
}