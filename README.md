# PHP
* PHP(PHP: Hypertext Preprocessor PHP: 하이퍼텍스트 프리 프로세서는 프로그래밍 언어의 일종이다. 원래는 동적 웹 페이지를 만들기 위해 설계되었으며 이를 구현하기 위해 PHP로 작성된 코드를 HTML 소스 문서 안에 넣으면 PHP 처리 기능이 있는 웹 서버에서 해당 코드를 인식하여 작성자가 원하는 웹 페이지를 생성한다. 근래에는 PHP 코드와 HTML을 별도 파일로 분리하여 작성하는 경우가 일반적이며, PHP 또한 웹서버가 아닌 php-fpm(PHP FastCGI Process Manager)을 통해 실행하는 경우가 늘어나고 있다.

---

### APM (Apache , PHP, Mysql) 구축
> Ubuntu 18.04 LTS 기준

1. Apache 설치
2. PHP 설치
3. Mysql 설치
4. PHP와 Mysql 연결
5. phpMyAdmin 과 Mysql 연결

---

1. Apache 설치
```
$ sudo apt-get -y install apache2
```


2. PHP 설치
```

* PHP5 :  $sudo apt-get -y install php5 libapache2-mod-php5
* PHP7 :  $sudo apt-get -y install php7.0 libapache2-mod-php7.0
* PHP : $sudo apt-get -y install php libapache2-mod-php
```
> apache2에서 기본문서 경로는 /var/www/html 이다. \n
이 폴더를 변경하고 싶으면 /etc/apache2/sites-available/000-default.conf 파일에서 경로 수정

3. MySQL 설치
```
  $sudo apt-get -y install mysql-server mysql-client
```
4. PHP와 MySQL 연결
```
PHP5 : $sudo apt-get -y install php5-mysql php5-curl php5-gd php5-idn php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl
```

```
PHP7 :
 $sudo apt-get -y install php7.0-mysql php7.0-curl php7.0-gd php7.0-intl php-pear php-imagick php7.0-imap php7.0-mcrypt php-memcache  php7.0-pspell php7.0-recode php7.0-sqlite3 php7.0-tidy php7.0-xmlrpc php7.0-xsl php7.0-mbstring php-gettext
```

```
PHP :
 $sudo apt-get -y install php-mysql
  $sudo /etc/init.d/apache2 restart (아파치 재기동)
```

5. phpMyAdmin과 MySQL 연결



  * phpmyadmin 설치하기
```
  $sudo apt-get -y install phpmyadmin
```
  * Web server to reconfigure automatically : <-- apache2 선택하기

  * Configure database for phpmyadmin with dbconfig-commmon? <-- No 선택하기

  * apache2.conf 마지막열에 아래구문 추가 (경로 : /etc/apache2/apache2.conf )

    - #Enable PhpMyAdmin
    - Include /etc/phpmyadmin/apache.conf

  * 아파치 재기동
    ```
    => $sudo /etc/init.d/apache2 restart
    ```
------------------
* mac에서 apm 설치하기
> https://getgrav.org/blog/macos-mojave-apache-multiple-php-versions

----

### 설치 완료후 ,
```
$sudo vim /etc/apache2/sites-available//default-ssl.conf
```
* 위의 명령어로 default settings 값 확인 (DocumentRoot : var/www/html)
* 브라우저에서 IP 입력하여 아파치 잘 동작하는지 확인 (192.168.122.1/index.html)
* DocumentRoot 경로에 phpinfo.php 생성
```
$ sudo vi phpinfo.php
```
* 생성후 내용 입력
```
<?php
phpinfo();
?>
```
* 잘 동작하는지 확인 (192.168.122.1/phpinfo.php)
