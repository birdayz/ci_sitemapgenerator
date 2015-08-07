# ci_sitemapgenerator
Code Igniter library to generate XML Sitemaps.

Usage (example taken from a CI controller)    

```
$this->load->library('sitemapgenerator');
header('Content-type: text/xml');
$this->sitemapgenerator->add(new SitemapUrl(base_url('YOUR_PAGE')));
... add all your pages
echo $this->sitemapgenerator->build();
```
