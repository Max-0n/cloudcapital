<?php
// Создаем подключение
$ch = curl_init(); // инициализация CURL СНЯТЬ КОМЕНТ ТУТ!!!
// Ввод пароля и идентификация 
curl_setopt($ch, CURLOPT_URL, "http://fx-trend.com//login/"); //адрес страницы лога 
//curl_setopt($ch, CURLOPT_URL, "http://fx-trend.com/my/pamm_investor/accounts/");

//curl_setopt($ch, CURLOPT_PROXY, "prox:port"); // через прокси 

//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // отключение сертификата 
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // отключение сертификата 


// отправка логина и пароля 
//curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //  следовать перенаправлениям сервера
//curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "login=Max0n&pass=nono"); 
//---------------------------------------------- 

//сохранение кукизов 
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt'); 
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt"); 
//curl_setopt($ch, CURLOPT_HEADER, 0); 

//if($ref!='') curl_setopt($ch, CURLOPT_REFERER, $ref); 

//if($cookie!='') curl_setopt($ch, CURLOPT_COOKIE, $cookie); 
// прописывание броузера 
//curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)'); 
//-------------------------------------------------------------- 
//curl_setopt($ch, CURLOPT_TIMEOUT, 50); 
//---------------------------------------------------------------- 


// сдесь сохранение страницы которая загрузилась бы с URL 
//$fp = fopen("proba.htm", "w"); // имя сохраняемого файла 
//curl_setopt($ch, CURLOPT_FILE, $fp); 
//curl_setopt($ch, CURLOPT_HEADER, 0); 
// закрытие файла 
//fclose($fp); 

// выполнение запроса библиотеки CURL

curl_exec($ch); 
//------------------------------------------------------- 
//curl_setopt($tmp["curl"], CURLOPT_FILE, NULL);
// print_r(curl_getinfo($ch)); // вывод структуры запроса 


// вывод ошибок при выполнении запроса 

//---------------------------------------------------------------- 
// закрытие сессии запроса 
curl_close($ch);
//echo (getElementById('inv117568_availsum'));
?>