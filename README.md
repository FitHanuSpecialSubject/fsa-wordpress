## Local installation

1. Tải và cài đặt laragon 6.0.0 từ link này:
    ```
    https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe
    ```
2. Bật cmd, nhập lần lượt từng lệnh như sau:
    ```
    cd C:\laragon\www
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