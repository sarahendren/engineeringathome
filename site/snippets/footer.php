	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="contact col-sm-6">
					<h2>Contact</h2>
					<?php echo $site->contact()->kt() ?>

					<h2>Connect</h2>
					<?php echo $site->social()->kt() ?>
				</div>
				<div class="copyright col-sm-6">
					<h2>Attribution</h2>
					<?php echo $site->copyright()->kt() ?>
				</div>	
			</div>
			<hr>
			<div class="row text-center">
				<a class="col-xs-12 back-to-top" href="#top"><i class="fa fa-arrow-circle-o-up"></i> Back to Top</a>
			</div>
		</div>
	</footer>
	<script>
	$(function() {
		FastClick.attach(document.body);
	});

	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
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