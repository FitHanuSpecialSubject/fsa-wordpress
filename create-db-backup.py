from datetime import datetime
from subprocess import Popen
import subprocess
import os

## Get current date
def get_current_date():
    now = datetime.now()
    formatted_date = now.strftime("%y-%m-%d")
    return formatted_date


## Get author name
def get_username_from_git():
    command = ['git', 'config', '--global', 'user.email']
    result = subprocess.run(command, capture_output=True, text=True)
    author_name = 'unknown-author'
    if result != '':
        output = result.stdout
        email = output.strip()
        user_name = email.split('@')[0]
        if '+' in user_name:
            user_name = user_name.split('+')[1];
        author_name = user_name
    
    if len(author_name) > 20:
        author_name = author_name[:20]
    return author_name


def backup_mysql_db(file_path):
    #C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysqldump
    mysql_entry_path = os.path.join('C:\\', 'laragon', 'bin', 'mysql', 'mysql-8.0.30-winx64', 'bin', 'mysqldump')
    print(mysql_entry_path)
    db_name = 'wordpress'
    db_user = 'root'
    dump_command = [mysql_entry_path, '-u', db_user, '--add-drop-database', '--databases', db_name]
    p1 = Popen(dump_command, stdout=subprocess.PIPE, stderr=subprocess.STDOUT, shell=True)
    dump_output = p1.communicate()[0]
    with open(file_path, 'wb') as f: 
        f.write(dump_output)
        f.close()


def get_formated_file_name_w_path(formatted_date, author_name, post_fix=0):
    current_directory = os.path.abspath(os.getcwd())
    backup_dir = 'wp-db-backup'
    if post_fix != 0:
        file_name = f"{formatted_date}-{author_name}-{post_fix}.sql"
    else:
        file_name = f"{formatted_date}-{author_name}.sql"
        
    file_path = os.path.join(current_directory, backup_dir, file_name)
    return file_path


def main():
    # Compose file path
    author_name = get_username_from_git()
    formated_date = get_current_date()
    file_path = get_formated_file_name_w_path(formated_date, author_name)

    # Check if file exists, else add post fix
    if os.path.exists(file_path):
        post_fix = 1
        while True:
            new_file_path = get_formated_file_name_w_path(formated_date, author_name, post_fix)
            if os.path.exists(new_file_path):
                post_fix += 1
            else:
                file_path = new_file_path
                break
    # Backup database
    print(file_path)
    backup_mysql_db(file_path)
    print(f"Backup completed, saved path: {file_path}")


if __name__ == "__main__":
    main()
