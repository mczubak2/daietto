# Szczegóły projektu
* Uruchomienie projektu:

  * [Docker Compose](#docker-compose)
  * [Webpack](#webpack)
  * [ESLint](#eslint)
  * [SASSLint](#sasslint)
  * [Dodatkowe informacje](#dodatkowe-informacje)

* Informacje:

  * [Osoby odpowiedzialne za projekt](#osoby-odpowiedzialne-za-projekt)

&nbsp;

  ```
  Options Indexes FollowSymLinks
  AllowOverride All
  Require all granted
  ```

&nbsp;

## Docker Compsoe

1. Zainstaluj Docker
2. Wejdź do katalogu z projektem
3. Uruchom kontenery za pomocą komendy "docker-compose up"
4. Zaimportuj bazę danych

## Webpack

1. Zainstaluj [Node.js](https://nodejs.org/) _(wersja 14.17.3)_.
2. Otwórz konsolę Node.js.
3. Przejdź do głównego katalogu motywu _(znajduje się w nim plik package.json)_.
4. Uruchom polecenie `npm i` _(tylko za pierwszym razem)_.

## ESLint

Projekt zawiera narzędzie **ESLint** sprawdzające, czy napisany kod jest zgodny z założoną konwencją. Aby zacząć z niego korzystać należy wykonać następujące kroki:
1. Przejdź do głównego katalogu motywu _(znajduje się w nim plik package.json)_.
2. Otwórz konsolę.
3. Uruchom polecenia: _(tylko za pierwszym razem)_.
  * `npm install eslint --save-dev`
  * `npm install eslint-plugin-import --save-dev`
  * `npm install eslint-config-airbnb-base --save-dev`
4. Zainstaluj rozszerzenie `ESLint` dla swojego edytora _(w zależności od edytora mogą być potrzebne również inne dodatkowe)_.
5. Otwórz konsolę ESLint po uruchomieniu pliku w formacie **.js** _(zostaną w niej wyświetlone wszystkie błędy)_.
6. Pisz swój kod JavaScript zgodnie z zasadami narzucanymi przez linter.

Baza reguł jest oparta na zestawie `eslint-config-airbnb-base`. Więcej informacji:
  * [reguły Airbnb](https://github.com/airbnb/javascript)
  * [reguły domyślne ESLint](https://eslint.org/docs/rules/)

W pliku `.eslintrc.json` znajdują się wyjątki nadpisujące domyślne reguły. Więcej informacji o nich można znaleźć [tutaj](https://eslint.org/docs/rules/). W przypadku wystąpienia błędów należy starać się napisać poprawny kod, zamiast dodawania nowych reguł do głównego pliku konfiguracyjnego.

&nbsp;

## SASSLint

Projekt zawiera narzędzie **SASSLint** sprawdzające, czy napisany kod jest zgodny z założoną konwencją.
O ile korzystasz z VS Code - polecam :) aby zacząć korzystać z lintera należy wykonać następujące kroki:
1. Zainstalować globalnie: eslinta **npm install -g sass-lint**
2. Zainstalować wtyczkę do VS Code: https://github.com/glen-84/vscode-sass-lint
3. W katalogu głownym projektu znaduje sie plik konfiguracyjny **/.sass-lint.yml** domyślnie SASSLint powinien go użyć.
6. Pisz swój kod SCSS zgodnie z zasadami narzucanymi przez linter.

Więcej informacji o nich można znaleźć [tutaj](https://github.com/sds/scss-lint/blob/master/lib/scss_lint/linter/README.md). W przypadku wystąpienia błędów należy starać się napisać poprawny kod, zamiast dodawania nowych reguł do głównego pliku konfiguracyjnego, szczególnie w przypadku `property-sort-order`.

&nbsp;

## Dodatkowe informacje

* adresy strony:
  * lokalny: `http://daietto.test/`
* adres logowania: **/wp-admin/**
* nie wrzucaj na serwer katalogu **/node_modules**
* pamiętaj przy każdym przenoszeniu serwisu na inny adres URL o wykonaniu akcji w panelu administracyjnym:
  * Settings -> Permalinks -> Save Changes
  * Languages -> Settings -> URL modifications (Settings) -> Save Changes _(dotyczy stron korzystających z pluginu Polylang)_

&nbsp;

## Podgląd

* krótka prezentacja -> `https://streamable.com/mqk7oe`

## TODO

1. start działania animacji sekcji
2. content do kart z wygenerowaną dietą

* Mikołaj Czubak *(developer)*