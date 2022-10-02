# Cyber-Sommelier
SWE-Projekt für das WS2020/21

Gruppe A6


### Anwendung installieren:


1. ```composer global require laravel/installer```

2. laravel new cyber-sommerlier
	- erstell ein Laravel Projekt im Ordner "cyber-sommerlier"
	-  Dann alle Inhalte aus dem git-Repository in den cyber-sommerlier Ordner kopieren



### Datenbank initialisieren:


1. In der .env Datei die Datenbank konfiguieren (Username,Passwort eingeben usw.)


2. ```php artisan migrate```
	- erstellt Tabellen in deiner Datenbank

3. ```php artisan db:seed```
	- legt in deiner Datenbank 30 Getränke, 5 Anbieter und einen Kunden an



### Symbolische Verknüpfung erstellen:

- ```php artisan storage:link```
	- damit die Bilder angezeigt werden



### Server starten:


- ```php artisan serve```
	- Zugriff auf die Webseite über: http://127.0.0.1:8000




# Tests ausführen

### Dusk installieren:


1. ```composer require --dev laravel/dusk```
		
2. ```php artisan dusk:install```
		
3. In der .env Datei muss man das ändern: ```APP_URL=http://127.0.0.1:8000```

4. Damit die Tests funktionieren muss man einen Server starten mit:
   ```php artisan serve```

5. Tests ausühren:

   ```php artisan dusk```



### Sonstiges:

- Alle Befehle mit ```php artisan``` müssen im Hauptverzeichnis des Ordners cyber-sommerlier ausgeführt werden

- Man muss voher PHP, Composer und Javascript auf dem Pc installieren

- Man muss sich voher eine Datenbank anlegen zB. eine MariaDB Datenbank


- Die Webseite hat 3 Nutzerrollen: Gast, Kunde und Anbieter

Momentan hat der Gast die gleichen Möglichkeiten wie der Kunde, da die Bewertung in der nächsten Version rauskommt.

Der Anbieter hat ganz andere Zugriffsrechte als der Kunde oder der Gast 

Develped By Jakub, Serdar and Dominik
