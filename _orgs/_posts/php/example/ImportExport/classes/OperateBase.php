<?php

namespace ImportExport\classes;

/**
 * 操作基础类
 * @package IPhpspreadsheet\classes
 */
class OperateBase
{
    /**
     * 导入路径
     * @var mixed|string
     */
    protected $importPath = '';
    /**
     * 导出路径
     * @var string
     */
    protected $exportPath = '';

    /**
     * 构造函数
     */
    public function __construct()
    {
        // 注意：以下为参考路径，实际开发时自定义
        $this->importPath = 'public/import_upload/'. date('Ymd') . '/';
        $this->exportPath = 'public/export_upload/' . date('Ymd') . '/';

        // 检查路径
        $this->checkAndCreatePath($this->importPath);
        $this->checkAndCreatePath($this->exportPath);
    }

    /**
     * 检查&创建目录
     * @param $path
     */
    private function checkAndCreatePath($path)
    {
        if (!file_exists($path)) {
            if (!mkdir($path, 0777, true) && !is_dir($path)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $path));
            }
            chmod($path, 0777);
        }
    }
}