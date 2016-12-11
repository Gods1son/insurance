
<?php
/*
Plugin Name: Random Quote
*/
function quote_shortcodes_init()
{
    function quote_shortcode($atts = [], $content = null)
    {
        $oQuote = json_decode(file_get_contents("http://api.forismatic.com/api/1.0/?method=getQuote&key=457653&format=json&lang=en"));
        $content .= $oQuote->quoteText;
        return $content;
    }
    add_shortcode('message-of-the-day-plugin', 'quote_shortcode');
}
add_action('init', 'quote_shortcodes_init');
