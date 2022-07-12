<?php
$loader = new Twig\Loader\FilesistemLoader('templates');
$twig=new Twig\Environment($loader);
$template=$twig->loadTemplate('index.twig');

$dbname="mysql";
$host="localhost";
$dsn = "sqlite:dbname=$dbname;host=$host"; 


$login = $_GET['login'];
$password = $_GET['password'];
$text = $_GET['text'];

if ((($login == 'admin1')&&($password == '1111'))||(($login == 'admin2')&&($password == '2222'))){
    $date=date(DATE_RFC822);
    $connection = new PDO($dsn, "denis200210", "");
    $sql = "INSERT INTO text (login, text, date) VALUES ($login, $text','$date');";
    $connection->exec($sql);  
}
else {echo "Ошибка в логине или пароле";}


$connection = new PDO($dsn, "Rita-00", "");

$sql = "SELECT FROM `text`";
$result = $connection->query($sql);
$mess = $result->fetchAll();

echo $template->render('nav.twig',array('mess'=>$mess));
?>