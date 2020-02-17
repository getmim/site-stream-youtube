<?php
/**
 * Meta
 * @package site-stream-youtube
 * @version 0.0.1
 */

namespace SiteStreamYoutube\Library;


class Meta
{
    static function single(object $page){
        $result = [
            'head' => [],
            'foot' => []
        ];

        $home_url = \Mim::$app->router->to('siteHome');

        // reset meta
        if(!is_object($page->meta))
            $page->meta = (object)[];

        $def_meta = [
            'title'         => $page->title,
            'description'   => $page->content->chars(160),
            'schema'        => 'BroadcastEvent',
            'keyword'       => ''
        ];

        foreach($def_meta as $key => $value){
            if(!isset($page->meta->$key) || !$page->meta->$key)
                $page->meta->$key = $value;
        }

        $result['head'] = [
            'description'       => $page->meta->description,
            'published_time'    => $page->created,
            'schema.org'        => [],
            'type'              => 'article',
            'title'             => $page->meta->title,
            'updated_time'      => $page->updated,
            'url'               => $page->page,
            'metas'             => []
        ];

        // schema breadcrumbList
        $result['head']['schema.org'][] = [
            '@context'  => 'http://schema.org',
            '@type'     => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'item' => [
                        '@id' => $home_url,
                        'name' => \Mim::$app->config->name
                    ]
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'item' => [
                        '@id' => $home_url . '#stream',
                        'name' => 'Stream'
                    ]
                ]
            ]
        ];

        // schema page
        $schema = [
            '@context'      => 'http://schema.org',
            'name'          => $page->meta->title,
            'description'   => $page->meta->description,
            'url'           => $page->page,
        ];

        $schema['@type']        = $page->meta->schema;

        $result['head']['schema.org'][] = $schema;

        return $result;
    }
}