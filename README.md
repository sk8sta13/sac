# sac
 Tela de atendimento ao cliente.

##Instalação

```
sudo git clone https://github.com/sk8sta13/sac.git
sudo mv ./sac /var/www/sac
sudo chmod 755 -Rf /var/www/sac/storage
cd /var/www/sac
sudo composer install
```

##Criando e preenchedo o banco de dados

Você pode configurar os dados de conexão do seu MySQL no arquivo "/var/www/sac/.env", os dados padrão são:
host: localhost
porta: 3306
base de dados: sac
usuário: root
senha: 101010

Depois execute os seguintes comandos.
```
cd /var/www/sac
sudo php artisan migrate
sudo php artisan db:seed
```

Pronto o banco de dados foi criado e uma massa de dados de teste foi criada.

##Observações

* O VHost deve apontar para "/var/www/sac/public", se quiser tenho um ".sh" que cria vhosts, veja [aqui](https://github.com/sk8sta13/vhost).
* Para acessar a listagem de chamados acesse "http://seu_vhost/report".
* Qualquer dúvida entre em contato comigo.