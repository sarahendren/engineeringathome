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
	<script>
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