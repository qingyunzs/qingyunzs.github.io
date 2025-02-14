#!/bin/bash

# 指定要扫描的目录
DIRECTORY="./assets/music-lib"

# 指定输出的CSV文件
OUTPUT_FILE="_data/music-files.csv"

# 初始化CSV文件，写入表头
echo "title,file_name,artist,album" > "$OUTPUT_FILE"

# 遍历目录中的音频文件
find "$DIRECTORY" -type f \( -iname "*.mp3" -o -iname "*.wav" -o -iname "*.flac" \) | while read FILE
do
    # 使用 ffprobe 提取元数据
    TITLE=$(ffprobe -v error -show_entries format_tags=title -of default=noprint_wrappers=1:nokey=1 "$FILE")
    ARTIST=$(ffprobe -v error -show_entries format_tags=artist -of default=noprint_wrappers=1:nokey=1 "$FILE")
    ALBUM=$(ffprobe -v error -show_entries format_tags=album -of default=noprint_wrappers=1:nokey=1 "$FILE")
    
    # 获取文件名
    FILENAME=$(basename "$FILE")
    
    # 写入CSV文件
    echo "$TITLE,$FILENAME,$ARTIST,$ALBUM" >> "$OUTPUT_FILE"
done

echo "音频文件信息已写入 $OUTPUT_FILE"