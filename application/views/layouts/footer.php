				</div>
			</div>
		</div>
	</div>

	<div style="clear: both"></div>

	<footer class="footer">
      <div class="container">
        <div class="text-muted text-center">&copy; <?=date('Y'); ?> All rights reserved</div>
      </div>
    </footer>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script type="text/javascript">
		function showPopupMessage(msg) {
			if (msg) {
				$('#popup-message').html(msg.message);
				$('#popup-message').addClass('bg-'+msg.type);

				$('#popup-message').show(500);

				setTimeout(hidePopupMessage, 3000)
			}
		}

		function hidePopupMessage() {
			$('#popup-message').html('');
			$('#popup-message').removeClass('bg-success');
			$('#popup-message').removeClass('bg-danger');

			$('#popup-message').hide(1000)
		}

		<?php if ($this->session->flashdata('popup_message')) { ?>
		showPopupMessage(<?=json_encode($this->session->flashdata('popup_message')) ?>)
		<?php } ?>
	</script>
  </body>
</html>