
    <?php if ( vw_is_enable_breaking_news() ) get_template_part( '/templates/breaking-news-bar' ); ?>

    <?php get_template_part( '/templates/site-footer' ); ?>

    </div>
    <!-- End Site Wrapper -->

    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-525474-1', 'auto');
      ga('send', 'pageview');
    </script>
    
    <!-- WP Footer -->
    <?php wp_footer(); ?>
    <!-- End WP Footer -->
    <script src="<?= get_bloginfo("template_url"); ?>/bower_components/tap/dist/tap.min.js"></script>
    
    <iframe name="print_frame" width="0" height="0" style="width: 0; height: 0; position: absolute" frameborder="0" src="" id="js-print-iframe" onload="">
        <html>
          <head>
            <meta charset="UTF-8">
            <title>Commetary</title>
            <style>
              h1,
              h2,
              h3 {
                font-weight: bold;
              }

              h1 {
                font-size: 1.6em;
                line-height: 1.25em;
                margin-top: 20px;
              }

              h2 {
                font-size: 1.2em;
                line-height: 1.51em;
              }

              h3 {
                font-size: 1em;
                line-height: 1.66em;
              }

              a {
                text-decoration: underline;
                font-weight: normal;
                /*color: inherit;*/
              }

              a,
              a:visited,
              a:hover,
              a:active {
                color: #0095dd;
              }

              * {
                max-width: 100%;
                height: auto;
              }
              
              .vw-featured-image {
                margin-bottom: 30px;
              }

              p,
              code,
              pre,
              blockquote,
              ul,
              ol,
              li,
              figure,
              .wp-caption {
                margin: 0 0 30px 0;
              }

              .vw-embeded-audio {
                display: none;
              }

              p > img:only-child,
              p > a:only-child > img:only-child,
              .wp-caption img,
              figure img {
                display: block;
              }

              img[moz-reader-center] {
                margin-left: auto;
                margin-right: auto;
              }

              .caption,
              .wp-caption-text,
              figcaption {
                font-size: 0.9em;
                line-height: 1.48em;
                font-style: italic;
              }

              code,
              pre {
                white-space: pre-wrap;
              }

              blockquote {
                padding: 0;
                /*-moz-padding-start: 16px;*/
              }

              blockquote p {
                border: 2px solid black;
                display: block;
                font-style: italic;
                padding-left: 16px;
              }

              ul,
              ol {
                padding: 0;
              }

              ul {
                -moz-padding-start: 30px;
                list-style: disc;
              }

              ol {
                -moz-padding-start: 30px;
                list-style: decimal;
              }
              /* Hide elements with common "hidden" class names */
              .visually-hidden,
              .visuallyhidden,
              .hidden,
              .invisible,
              .sr-only {
                display: none;
              }
            </style>
          </head>
          <body>
            
          </body>
        </html>
    </iframe>

  </body>

</html>