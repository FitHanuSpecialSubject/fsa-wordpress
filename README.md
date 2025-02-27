## Local installation

1. Tải và cài đặt laragon 6.0.0 từ link này:
    ```
    https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe
    ```
    ### LƯU Ý, CÀI ĐẶT VÀO Ổ C NHƯ MẶC ĐỊNH
2. Bật cmd, nhập lần lượt từng lệnh như sau:
    ```
    mkdir C:\laragon\www\wordpress
    cd C:\laragon\www\wordpress
    git clone https://github.com/FitHanuSpecialSubject/fsa-wordpress.git .
    curl https://raw.githubusercontent.com/suyttthideptrai/database_backup/refs/heads/main/_wordpress_12-03.sql --output C:\laragon\db-backup.sql
    cd C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin
    mysql -u root < C:\laragon\db-backup.sql
    ```

3. Mở laragon lên nhấn vào start
4. Mở trình duyệt và truy cập link sau:
    ```
    http://localhost/wordpress
    ```



## Tạo hoặc import backup database

1. Tạo backup

#### Nếu máy đã cài python

```
python db-backup-create.py
```

#### Nếu máy chưa cài python

```
C:\laragon\bin\python\python-3.10\python db-backup-create.py
```

#### Nếu tên file bao gồm unknown-author, cài đặt email của bạn vào config của git (global) và tạo lại sẽ có tên

2. Import backup

#### Nếu máy đã cài python

```
python db-backup-import.py
```

#### Nếu máy chưa cài python

```
C:\laragon\bin\python\python-3.10\python db-backup-import.py
```

#### Command sẽ lựa chọn bản backup được tạo gần nhất để import