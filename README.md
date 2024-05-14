# Public Identifier DOI Plugin

## Information

The DOI (Digital Object Identifier) plugin provides an infrastructure for assigning unique DOI identifiers to articles, journal issues, and files. A DOI is a numeric identifier that allows for pointing to an electronic item (like an article) permanently, even if its URL changes. This facilitates the tracking, referencing, and citation of content items over time, irrespective of their location on the web.

Developer: Original plugin developed by the PKP OJS team. The modification for obfuscation and custom suffix generation was carried out by the University Paris Cité Open Access team.

## Features

- Automatic or manual DOI assignment.
- Integration with DOI registration agencies such as Crossref.
- Support for setting up DOI prefixes and suffixes.
- **New:** Method for generating the DOI suffix using the article's identifier (submissionId):
    ```php
    $hashcode = "";
    if ($submissionId < 8000) {
        $hashcode = substr(hash("crc32c", strval($submissionId)), 0, 4);
    } elseif ($submissionId < 200000) {
        $hashcode = substr(hash("crc32c", strval($submissionId)), 0, 6);
    } else {
        $hashcode = substr(hash("crc32c", strval($submissionId)), 0, 8);
    }
    $pattern = str_replace("%h", $hashcode, $pattern);
    ```

## How to Use

1. Download the tar.gz release.
2. Upgrade the DOI plugin with the tar.gz through the "Website/Plugin/Installed Plugins" menu.

## Licensing

The DOI plugin is licensed under GPLv3.
