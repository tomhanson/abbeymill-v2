    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 copyright">
                    <p>T: 01234 714844</p>
                    <p>&#169; Abbeymill Homes <?php echo date(Y)?></p>
                </div>
            </div>
        </div>
    </footer>
</div><!-- close sticky footer -->
<!--Start Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46592667-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- End Analytics -->
<!-- Start Plugins -->
<script type="text/javascript" src="<?php print TEMPPATH; ?>/js/google-maps.min.js"></script> 
<script src="<?php print TEMPPATH;?>/js/modernizrTouch.js"></script>
<script src="<?php print TEMPPATH;?>/js/main.min.js"></script>
<!--End Plugins -->
<?php wp_footer(); ?>
</body>
</html>