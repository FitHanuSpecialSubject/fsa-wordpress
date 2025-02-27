import os
import glob
import subprocess

CURRENT_DIRECTORY = os.path.abspath(os.getcwd())
MYSQL_ENTRY = os.path.join('C:\\', 'laragon', 'bin', 'mysql', 'mysql-8.0.30-winx64', 'bin', 'mysqldump')
ADMIN_ENTRY = os.path.join('C:\\', 'laragon', 'bin', 'mysql', 'mysql-8.0.30-winx64', 'bin', 'mysqladmin')

def is_mysql_running():
    try:
        result = subprocess.run([ADMIN_ENTRY, 'ping', '-h', 'localhost', '-P', '3306', '-u', 'root'], capture_output=True, text=True)
        if 'mysqld is alive' in result.stdout:
            return True
        else:
            return False
    except Exception as e:
        print(f"Error checking MySQL status: {e}")
        return False


def get_backup_files():
    backup_dir = 'wp-db-backup'
    list_of_files = glob.glob(os.path.join(CURRENT_DIRECTORY, backup_dir, '*'))
    return list_of_files


def handle_backup(file_path):
    db_name = 'wordpress'
    db_user = 'root'

    # Drop the existing database
    drop_command = f'{MYSQL_ENTRY} -u {db_user} -e "DROP DATABASE IF EXISTS {db_name};"'
    subprocess.run(drop_command, shell=True)

    # Import the backup file into the new database
    import_command = f'{MYSQL_ENTRY} -u {db_user} {db_name} < {file_path}'
    subprocess.run(import_command, shell=True)


def main():
    if is_mysql_running() == False:
        print("MySQL is not running. Please start MySQL service (via Laragon) and try again.")
        return
    list_of_files = get_backup_files()
    latest_file = max(list_of_files, key=os.path.getctime)
    print(f"File \"{latest_file}\" will be used to import to mysql db name *wordpress*")
    prompt = "This action will overide all the data in *wordpress* database. Do you want to continue? (Y/N):"
    response = input(prompt).strip().lower()
    if response != 'y':
        print("Import cancelled.")
        return

    handle_backup(latest_file)
    print("Import completed")

if __name__ == "__main__":
    main()