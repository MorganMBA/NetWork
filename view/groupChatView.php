<?php 
$title = "Messages";
ob_start();
?>
<script src="js/filter.js"></script>
<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
			
				<img id="profile-img" src="./img/profile/<?= $userProfile['photo'] ?>" class="online rounded-circle" width="45" alt="" />
				<p><?= $userProfile['name'] . ' ' . $userProfile['lastName'] ?></p>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input id="contactSearch" onkeyup="filter()" type="text" placeholder="Recherchez un contact..." />
		</div>
		<div id="contacts">
			<ul id="contactList">
			<?php for ($i = 0; $i < count($contactProfile); $i++) : ?>
			<a class="contactLink" style="text-decoration:none;color:white" href='index.php?action=showMessages&contactId=<?=$contactProfile[$i]['id']?>'>

				<li class="contact">
					<div class="wrap">
						<span class="contact-status online"></span>
						<img class="rounded-circle" width="45"src="./img/profile/<?= $contactProfile[$i]['photo'] ?>" alt="" />
						<div class="meta">
						<p class="name"><?= $contactProfile[$i]['name'] . ' ' . $contactProfile[$i]['lastName'] ?></p>
						</div>
					</div>
				</li>
			</a>		
        <?php endfor;	
				 for ($i = 0; $i < count($groups); $i++) : ?>
			<a class="contactLink" style="text-decoration:none;color:white" href='index.php?action=showGroupMessages&groupId=<?=$contactProfile[$i]['id']?>'>

				<li class="contact">
					<div class="wrap">
						<span class="contact-status online"></span>
						<img class="rounded-circle" width="45"src="./img/profile/<?= $userProfile['photo'] ?>" alt="" />
						<div class="meta">
						<p class="name"><?= $groups[$i]['title']?></p>
						</div>
					</div>
				</li>
			</a>		
				<?php endfor ?>	
			</ul>
		</div>
		
	</div>
	<div class="content">
		<div class="contact-profile">
	<!--	PHOTO DU GROUPE <img class="rounded-circle" width="45"src="./img/profile/<$groups['photo'] ?>" alt="" /> -->
			<p><?= $groups['name']?></p>
        </div>
        
		<div class="messages">
			<ul id="messages">
			 <?php 
			while ($messagesFetch = $messages->fetch()) :
				if ($messagesFetch['user'] == $_SESSION['id']) {
				$class = "sent";
			} else {
				$class = "replies";
			}
			?>
				<li id="<?= $messagesFetch['id'] ?>" class=<?= $class ?>>
				<?php if($messagesFetch['user']==$_SESSION['id']):?>
					<img src="./img/profile/<?=$userProfile['photo']?>" alt="">
				<?php else:?>
				<img src="./img/profile/<?=$receiverProfile['photo']?>" alt="">
				<?php endif?>
					<p><?= $messagesFetch['message'] ?></p>
				</li>
                    <?php endwhile ?>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<form>
				<input type="text" name="message" id="message" placeholder="Écrivez votre message" />
				<input type="hidden" name="groupId" id="groupId" value=<?= $_GET['groupId'] ?>>
				<i class="fa fa-paperclip attachment" aria-hidden="true"></i> 
				<button type="button" id="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</form>
			</div>
		</div>    
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/groupChat.js">
</script>
 <?php 
$content = ob_get_clean();
include_once('./view/template.php');
?>