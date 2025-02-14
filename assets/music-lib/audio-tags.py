import os
from mutagen.mp3 import MP3
from mutagen.id3 import ID3, TIT2, TPE1

def update_mp3_metadata(mp3_file):
    try:
        # 打开 mp3 文件
        audio = MP3(mp3_file, ID3=ID3)

        # 从文件名提取 artist 和 title（假设格式为 artist-title.mp3）
        filename = os.path.basename(mp3_file)

        # 检查文件名是否包含 '-'
        if '-' in filename:
            artist, title = filename.split('-', 1)
            artist = artist.strip()
            title = title.rsplit('.', 1)[0].strip()  # 去除文件扩展名
            audio.tags = ID3()  # 清空现有元数据，避免冲突
            audio.tags.add(TPE1(encoding=3, text=artist))  # 设置 artist
            audio.tags.add(TIT2(encoding=3, text=title))   # 设置 title
            print(f"Updated metadata for {filename}: Artist={artist}, Title={title}")

        else:
            # 如果没有 '-'，则只设置 title，artist 留空
            title = filename.rsplit('.', 1)[0].strip()  # 去除文件扩展名
            audio.tags = ID3()  # 清空现有元数据
            audio.tags.add(TIT2(encoding=3, text=title))  # 设置 title
            print(f"Updated metadata for {filename}: Title={title}")

        # 保存修改
        audio.save()

    except Exception as e:
        print(f"Error processing {mp3_file}: {e}")

def batch_update_mp3_metadata(directory):
    # 遍历目录中的所有 mp3 文件
    for filename in os.listdir(directory):
        if filename.lower().endswith(".mp3"):
            mp3_file = os.path.join(directory, filename)
            update_mp3_metadata(mp3_file)

if __name__ == "__main__":
    # 指定包含 MP3 文件的目录路径
    directory = "/Users/zrg/qingyunzs.github.io/assets/music-lib"
    batch_update_mp3_metadata(directory)

