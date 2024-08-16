# DotPH Whois Crawler

DotPH (dot.ph) doesnt have whois server, but they have the web version of it. So i have to make some sort of scraping/crawler engine to check whois domain on their website. And this is the simple version that i made.

## Usage

```text
{baseUrl}/api/crawl/{domaindotph}
```

## Return
``` 
true = domain exists
false = domain not exist
```
