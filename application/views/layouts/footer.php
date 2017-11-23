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