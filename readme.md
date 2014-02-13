Guestbook
=========

Jednoduchá ajaxová kniha návštěv.

Zadání bylo vytvořit komponentu, která by sloužila jako jednoduchá diskuze, nebo návštěvní kniha.
Každá komponenta je unikátní, psát příspěvky může každý a mazat smí jen administrátor.


Instalace
---------

1. Repozitář neobsahuje externí knihovny (Nette, Dibi), je potřeba je stáhnout pomocí composeru (`$ composer update`).
2. Vytvořte si databázi pomocí skriptu `app/model/database/database.sql`. Databáze již obsahuje uživatele `admin` s heslem `admin`.
3. Zkopírujte si soubor `config.local.example.neon` na `config.local.neon` a doplňte do něj své údaje o databázi.
4. Volitelně si databázi naplňte testovcími daty. Skript `app/model/database/database_testdata.sql` obsahuje nějaké příspěvky a uživatele `Jan Novák` s přihlašovacím jménem `user` s heslem `user`.