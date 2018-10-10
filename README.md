# Esempio di invio delle fatture elettroniche verso il SdI
Vista la poca documentazione circa l'invio delle fatture elettroniche verso il sistema di interscambio (SdI) utilizzando PHP ho creato questo repository. In questo repository trovi un codice d'esempio che ti permette di effettuare l'invio di una fattura elettronica di esempio versio il SdI.

Prima di utilizzare lo script per l'invio della fattura devi creare la cartella `certs` e inserirci i seguenti certificati:
- CA_Agenzia_delle_Entrate_all.pem
- private-client.key
- SDI-03445160546-client.pem
Per sapere come crearli ti rimando a questo [post](https://www.lorenzomillucci.it/2018/10/09/sdi-fattura-elettronica-php/) 

Per eseguire l'invio della fattura verso il SdI ti basta eseguire lo script con il comando:
`php TestInvioFatture.php`

Nel caso in cui non abbia PHP installato e configurato all'interno della tua macchina, ho creato un container Docker che puoi utilizzare per eseguire lo script. Tramite i comandi di seguito puoi creare il container ed avviare lo script:
```
docker build -t fatture-php .
docker run -it --rm fatture-php
```

Questo script non sarebbe stato possibile se non ci fossero stati i preziosissimi contributi di diversi utenti all'interno del forum italia. Grazie! :)  
[Fonte A](https://forum.italia.it/t/accreditamento-sdicoop-configurazione-ssl-su-apache/3314/6)  
[Fonte B](https://forum.italia.it/t/installazione-certificati-canale-sdicoop/3382)
