</div>
<footer class="footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">	
				<div class="contact">
					<?php echo $site->contact()->kt() ?>
				</div>
				<div class="copyright">
					<?php echo $site->copyright()->kt() ?>
				</div>	
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
	</script>
</body>
</html>