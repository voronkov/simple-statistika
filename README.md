Если вам необходимо следить за реальной статистикой своих сайтов, приложение именно для вас.
Для запуска достаточно скопировать приложение на сервер и выставить права на запись на следующие папки: assets, /protected/runtime.
Скрипт необходимый для отправки статистики:
                <script>
                    var sendUrl = 'http://youdomain.com'; // ваш домен
                    var url = sendUrl+'/statistika/getUrl?url='+document.location.href;
                    $.get(url, function(response) {
                    });
                </script>
Данные для просмотра статистики:
Логин: admin
Пароль: super123pass
Пароль можно задать свой в файле protected/components/UserIdentity.php
