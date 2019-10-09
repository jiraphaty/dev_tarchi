1.เพิ่มโดเมนจำลองใน C:\Windows\System32\drivers\etc\host

****

127.0.0.1 localhost.nd

****


2.เพิ่มที่เก็บไฟล์ของเซิร์ฟเวอร์ xampp\apache\conf\httpd.conf ****

**** code ****

<Directory "C:/xampp/htdocs_test_2">
  Options Indexes FollowSymLinks MultiViews ExecCGI
  AllowOverride All
  Allow from all
</Directory>

********************************

***********

3. เพิ่ม VirtualHost ใน xampp\apache\conf\extra\httpd-vhosts.conf

*** ค่าเดิม ***

<VirtualHost *:80>
  documentRoot "C:/xampp/htdocs"
  ServerName localhost
  <Directory "C:/xampp/htdocs">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Order Deny,Allow
    Allow from all
  </Directory>
</VirtualHost>

*** อันใหม่ ***

<VirtualHost *:80>
  DocumentRoot "C:/xampp/htdocs_test_2"
  ServerName localhost.nd
  ServerAlias www.localhost.nd
  ErrorLog "logs/mysite.test-error.log"
  CustomLog "logs/mysite.test-access.log" common
  <Directory "C:/xampp/htdocs_test_2">
    Require all granted
  </Directory>
</VirtualHost>
