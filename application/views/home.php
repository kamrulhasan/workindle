<div class="section top_silder-section">
	<div class="container">
		<div class="row pt-3 topPart">		
			<div class="col-md-6">
				<?php //include_once('top_silder2.php'); ?>
				
				<p> 
				Giobaba is an international group specialized in the training of talents and professions.  Thanks to the collaboration with professional schools and training centers present in the Asian continent, talents, after training are sponsored on the "giobaba.com" portal and made available to markets and companies that currently fight with the chronic shortage of local manpower and the lack of skilled workers (Europe; Middle East, Japan, United States).  Through partnerships with Asian recruitment agencies, the group is able to provide recruitment services for Asian personnel (India, Bangladesh, Vietnam, etc.).  The skills of the workers are demonstrated by the qualification certificates and shown through a "skills video" in which the worker shows his skills.
				<br>
                    Our team is made up of Bangladeshi, Indian, French and British personnel, boasting extensive experience in workforce training and management, offering personalized recruitment services for specialized Asian workers.
				
				</p>   
			</div>
			
			<div class="col-md-6">

			<?php
				$config = get_site_config('home');
				$videoId = get_video_id($config->speach);					

			 if($videoId) { ?>
					<blockquote class="tiktok-embed" cite="<?=$config->speach;?>" data-video-id="<?=$videoId?>" data-embed-from="embed_page" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@emirabdulgani" href="https://www.tiktok.com/@emirabdulgani?refer=embed">@emirabdulgani</a> <p>Les</p> <a target="_blank" title="♬ sonido original - Emir Abdul Gani" href="https://www.tiktok.com/music/sonido-original-7281303192802216709?refer=embed">♬ sonido original - Emir Abdul Gani</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
				<?php } ?>
			
			
			</div>
		</div>
	</div>
</div>

<div class="clearfix"><p class="pt-1"></p></div>



