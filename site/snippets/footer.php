	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="contact col-sm-4">
					<h2>Contact <i class="fa fa-envelope"></i></h2>
					<hr>
					<?php echo $site->contact()->kt() ?>
				</div>
				<div class="social col-sm-4">
					<h2>Connect <i class="fa fa-facebook"></i></h2>
					<hr>
					<?php echo $site->social()->kt() ?>
				</div>
				<div class="copyright col-sm-4">
					<h2>Re-use <i class="fa fa-creative-commons"></i></h2>
					<hr>
					<?php echo $site->copyright()->kt() ?>
				</div>	
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'sej2hcu',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	$(function() {
		FastClick.attach(document.body);
	});
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-72234537-1', 'auto');
	ga('send', 'pageview');
	</script>
</body>
</html>