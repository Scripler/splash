<?php get_header(); ?>

<div id="description">
	<div class="english-text">
	<h2><?php echo get_option(THEME_PREFIX . "intro_title"); ?></h2>
	<p><?php echo get_option(THEME_PREFIX . "intro_text"); ?></p>
	</div>
	<div class="danish-text">
		<h2>Skriv — Samarbejd — Udgiv — Del</h2>
	<p>Scripler gør det muligt for alle at skrive, redigere, dele og udgive bøger. På Internettet, som ebøger og traditionelle trykte bøger. Samtidigt.</p>
</div>

<div id="register">
	<form id="signup" action="<?=$_SERVER['PHP_SELF']; ?>" method="get">
		<fieldset>
			<span id="response">
				<?php 
				
				function storeAddress(){
					if(!$_GET['email']){ return "Please enter a valid email address"; } 
				
					if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {
						return "Email address is invalid"; 
					}
				
					require_once('mailchimp/MCAPI.class.php');
					
					$mc_api = get_option(THEME_PREFIX . "mc_api");
					$api = new MCAPI('' . $mc_api . '');
					
					$mc_list_id = get_option(THEME_PREFIX . "mc_list_id");
					$list_id = "$mc_list_id";
				
					if($api->listSubscribe($list_id, $_GET['email'], '') === true) {
						return 'Great! Check your email to confirm.';
					}else{
						return 'Error: ' . $api->errorMessage;
					}
					
				}
				
				if($_GET['submit']){ echo storeAddress(); } 
				
				?>
			</span>
			
			<input class="email" type="text" name="email" id="email" value="Email" onfocus="doClear(this)" />
			<input type="submit" name="submit" value="Submit" class="btn" alt="Join" />
		</fieldset>
	</form>
</div> <!-- register -->



<div id="twitter">
	<a class="twitter" href="http://www.twitter.com/<?php echo get_option(THEME_PREFIX . "twitter_name"); ?>" target="_blank" title="Follow">@<?php echo get_option(THEME_PREFIX . "twitter_name"); ?></a>
</div>

<?php get_footer(); ?>