  <footer class="footer cf" role="contentinfo">

    <div class="copyright">
      <?php echo $site->copyright()->kirbytext() ?>
    </div>

    <div class="colophon">
      <a href="http://getkirby.com/made-with-kirby-and-love">Made with Kirby and <b>♥</b></a>
    </div>

  </footer>
 </div>
	<script src="/node_modules/flickity/dist/flickity.pkgd.min.js"></script>
	<link rel="stylesheet" href="/node_modules/flickity/dist/flickity.min.css">
		<script>
		  (function(d) {
		    var config = {
		      kitId: 'sej2hcu',
		      scriptTimeout: 3000,
		      async: true
		    },
		    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
		  })(document);
		</script>
<!--		<?php echo panelBar::show() ?>	-->
</body>
</html>