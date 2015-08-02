<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sitemapgenerator
{
    /* @var $urls SitemapUrl[] */
    private $urls = array();

    /**
     * Return string with xml content of this sitemap
     */
    public function build()
    {
        return $this->generateXml();
    }

    /**
     * Add sitemap object
     * @param SitemapUrl $url
     */
    public function add(SitemapUrl $url)
    {
        $this->urls[] = $url;
    }

    /**
     * @return string
     */
    private function generateXml()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        /* @var $url SitemapUrl */
        foreach ($this->urls as $url) {
            $xml .= $url->render();
        }
        $xml .= '</urlset>';
        return $xml;
    }
}

class SitemapUrl implements Renderable
{
    private $loc;

    public function __construct($url)
    {
        $this->loc = $url;
    }

    public function render()
    {
        $ret = '<url>';
        $ret .= '<loc>' . $this->loc . '</loc>';
        $ret .= '</url>';
        return $ret;
    }
}

interface Renderable
{
    public function render();
}