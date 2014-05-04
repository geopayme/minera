    <body>
        <!-- Automatic element centering using js -->
        <div class="center">            
            <div class="headline text-center" id="time">
                <!-- Time auto generated by js -->
				<?php echo (!$timer) ? $title : ""; ?>
            </div><!-- /.headline -->
            
            <!-- User name -->
            <div class="lockscreen-name"><?php echo $message ?></div>			
        </div><!-- /.center -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
				<?php if ($timer) : ?>timer();<?php endif; ?>
                $(".center").center();
                $(window).resize(function() {
                    $(".center").center();
                });
            });

			var count=<?php echo $seconds ?>;

			function timer()
			{
			  count=count-1;
			  if (count < 0)
			  {
			     clearInterval(counter);
			     //counter ended, do something here
			     return;
			  }
			
			  if (count == 0)
			  {
			  	  $(".lockscreen-name").hide();
				  $("#time").html("<?php echo $messageEnd ?>");
				  $(".center").center();
				  $(".center").center();				  
			  }
			  else
				  $("#time").html(count);

			  setTimeout(function() {
                    timer()
                }, 1000);
			}

            /* CENTER ELEMENTS IN THE SCREEN */
            jQuery.fn.center = function() {
                this.css("position", "absolute");
                this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                        $(window).scrollTop()) - 30 + "px");
                this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                        $(window).scrollLeft()) + "px");
                return this;
            }
        </script>
    </body>
</html>