<?php

namespace ImportExport\classes;

use importExport\factory\ImportExport;

class XlswriterOperate extends OperateBase implements IXlswriter
{
    /**
     * Excel类对象
     * @var \Vtiful\Kernel\Excel|null
     */
    protected $excel = null;

    public function __construct()
    {
        parent::__construct();

        $path = config('import_export.import_upload_dir');
        // Excel类对象
        $config = ['path' => $path];
        $this->excel = new \Vtiful\Kernel\Excel($config);
    }

    /**
     * @inheritDoc
     */
    public function readExcel($fileName, $skipFirstRow = false, $other_options = []): array
    {
        try {
            $tempExcel = $this->excel->openFile($fileName)
                ->openSheet();
            if ($skipFirstRow){
                $tempExcel->setSkipRows(1);
            }
            /**
             * @var $other_options['data_type']
             * 调用示例：
             * [
             *  0 => \Vtiful\Kernel\Excel::TYPE_STRING,
             *  1 => \Vtiful\Kernel\Excel::TYPE_TIMESTAMP
             * ]
             */
            $data_type = $other_options['data_type'];
            if (!empty($data_type)){
                $tempExcel->setType($data_type);
            }

            $data = $tempExcel->getSheetData();
        } catch (\Exception $ex) {
            Throw new \Exception('【error】读取Excel发生异常：' . $ex->getMessage());
        }
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function readCsv($fileName, $skipFirstRow = false): array
    {
        // TODO: Implement readCsv() method.
    }

    /**
     * @inheritDoc
     */
    public function downloadExcel($fileName, $isGenerateFile = false)
    {
        // TODO: Implement downloadExcel() method.
    }

    /**
     * @inheritDoc
     */
    public function exportToExcel($data, $header, $isWriteHeader = false, $sheetName = 'Sheet1', $other_options = [], $worksheet = null)
    {
        // TODO: Implement exportToExcel() method.
    }
}