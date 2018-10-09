# Esempio di invio delle fatture elettroniche verso il SdI
Vista la poca documentazione circa l'invio delle fatture elettroniche verso il SdI utilizzando PHP ho creato questo repository.

Prima di utilizzare il codice devi creare la cartella `certs` e inserendo all'interno i seguenti certificati:
- CA_Agenzia_delle_Entrate_all.pem
- private-client.key
- SDI-03445160546-client.pem
Per sapere come crearli ti rimando a questo [post](https://www.lorenzomillucci.it/2018/10/04/sdi-fattura-elettronica-php/) 

Per eseguire il codice basta eseguire lo script con il comando:
`php TestInvioFatture.php`

Nel caso in cui non abbia PHP installato e configurato nella tua macchina ho creato un container Docker che puoi utilizzare per eseguire il test. Esegui i comandi di seguito per creare il container ed eseguire lo script:
```
docker build -t fatture-php .
docker run -it --rm fatture-php
```

[Fonte A](https://forum.italia.it/t/accreditamento-sdicoop-configurazione-ssl-su-apache/3314/6) 
[Fonte B](https://forum.italia.it/t/installazione-certificati-canale-sdicoop/3382)