cd C:\laragon\www
git clone https://github.com/FitHanuSpecialSubject/fsa-wordpress.git .
curl https://raw.githubusercontent.com/suyttthideptrai/database_backup/refs/heads/main/_wordpress_12-03.sql --output C:\laragon\db-backup.sql
cd C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin
mysql -u root < C:\laragon\db-backup.sql