<!DOCTYPE html>
<html {{ language_attributes() }}>

<head>
    <meta http-equiv="Content-Type" content="{{ bloginfo('html_type') }}; charset={{ bloginfo('charset') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Keywords">
    <meta name="author" content="Name">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>{{ wp_title('&laquo;', true, 'right') }} {{ bloginfo('name') }}</title>

    <link rel="shortcut icon" href="{{ get_template_directory_uri() }}/path/favicon.ico" />
    <link rel="pingback" href="{{ bloginfo('pingback_url') }}" />
    <link rel="alternate" type="application/rss+xml" title="{{ bloginfo('name') }} RSS2 Feed" href="{{ bloginfo('rss2_url') }}" />
    @php //comments_popup_script(); // off by default @endphp

    <style type="text/css" media="screen">
        @import url( {{ bloginfo('stylesheet_url') }} );
    </style>
     
    <!--=== WP_HEAD() ===-->
    {{ wp_head() }}
      
</head>
<body {{ body_class() }}>

<div id="rap">
<h1 id="header">
    Header
</h1>
