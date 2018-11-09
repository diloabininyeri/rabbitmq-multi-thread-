
Sunucuya rabbitmq kurulu olması gerekli :)
Rabbit.php deki gerekli ayarlar girilmeli.

'php consumer.php &' komutu ile consumer çalıştırılır. 
'php consumer.php &' komutu peş peşe çağırılarak birden fazla consumer oluşturulabilir
çalıştırıldıktan sonra 'php test.php' çalıştırılarak kaç tane consumer var görülebilir.
'php publisher.php' komutu ile kuyruğa mesaj yollanabilir.
'pkill -f consumer.php' komutu tüm çalışan consumer ları sonlandırır.

Kurgu : 
'php consumer.php &' 10 kere çalıştırılarak 10 tane consumer oluştrulur.
daha sonra yazılacak publisher lar ile kuyruğa işlemler atılır.
10 tane consumer işlemleri karşıladığı sürece işlemler multi thread çalışır.
'php test.php' ile consumer sayısı ve kuyruktaki işlem sayısını görüntüleye bilirsiniz.
eğer kuyruktaki işlem birikiyorsa consumerlar istekleri tam karşılayamıyor demektir.'php consumer.php &' komutu ile yeni consumerlar eklenebilir yoğunluğa göre.