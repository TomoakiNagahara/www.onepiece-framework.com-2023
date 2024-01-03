i18n API
===

# Usage - i18n

`api:/i18n/[language|translate]/`

# Usage - Microsoft Translator API

## Language

`api:/i18n/language/`

## Translate

`api:/i18n/translate/`

 * compatible - Google Translator API compatible mode.
 * from    - Source language.
 * to      - Translate language.
 * string  - Translate string.
 * strings - Translate strings.
 * txttype - Text type.

# Usage - Google Translator API

## "target"

 "target" is switch to translate or lauguage.

 * target
   1. translate
   2. language
   3. readme

## "translate"

 * translate
   1. from
   2. to
   3. strings

`api:/i18n/?html=1&target=translate&from=en:us&to=ja:jp&strings[]=test`

## "language"

 * language
   1. locale

`api:/i18n/?html=1&target=language&locale=ja:jp`

## "readme"

 * readme

`api:/i18n/?html=1&target=readme`
