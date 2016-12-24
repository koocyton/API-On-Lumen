
		<popup-title style="display:none;" class="popup-title">图标大全</popup-title>

		<div>
			<form method="post" action="">

				<div class="content-body radius-5 content-border" style="margin:0;">
					<div class="app-icons">
						<ul>
							<?php foreach ($icons as $icon) {?>
							<li style="text-align:center;vertical-align:center;">
								<div style="text-align:center;vertical-align:center;font-family:octicons;font-size:45px;">&#x{{ substr($icon, 1) }};</div>
								<br>
								<div style="text-align:center;vertical-align:center;">&amp;#x{{ substr($icon, 1) }};</div>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>

			</form>
		</div>
