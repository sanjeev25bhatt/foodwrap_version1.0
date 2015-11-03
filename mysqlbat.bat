SET PATH=%PATH%;C:\xampp\mysql\bin

@ECHO OFF
ECHO Deleting Previous Files
DEL sqlrun.txt

ECHO Creating script to run

FOR %%X IN (*.sql) DO type %%X >> sqlrun.txt

ECHO Running script
mysql -vvv -u root -p < sqlrun.txt

ECHO Deleting temporary files
DEL sqlrun.txt

ECHO Finished!