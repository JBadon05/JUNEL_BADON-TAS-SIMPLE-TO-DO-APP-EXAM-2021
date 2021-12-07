<?php
	$todolist = $conn->query("SELECT * FROM `todolist` ORDER BY id DESC");
?>

<?php if($todolist->rowCount() <= 0) { ?>

<div class="todos">
	<div style="height: 200px; padding-top: 30px;">
		<p class="getstarted" style="font-family: Fuzzy Bubbles;margin-top: 20px;">
			Do the best you can in every task, no matter how unimportant it may seem at the time. No one learns more about a problem than the person at the bottom. <br><br>
			<small style="font-family: Fuzzy Bubbles;"> - Sandra Day O'Connor <small>
		</p>
	</div>
</div>

<?php } ?>

<?php while($todos = $todolist->fetch(PDO::FETCH_ASSOC)) { ?>
<div class="todos">

	<div class="tooltip">
		<span id="<?php echo $todos['id'] ?>" class="erase"><i class="fal fa-eraser"></i></span>
		<span class="tooltiptext" style="font-family:Fuzzy Bubbles;">Erase</span>
	

	<?php if($todos['completed']){ ?>
		<input type="checkbox" class="check-box"  data-todo-id = "<?php echo $todos['id'] ?>" checked/>
		<h2 class="checked" style="font-family: Fuzzy Bubbles;"><?php echo $todos['task'] ?></h2>
		<small style="font-family:Fuzzy Bubbles;"><?php echo date("M d, Y - h:i a", strtotime($todos['datetime']));?></small>

	<?php }else{ ?>
		<input type="checkbox" class="check-box" data-todo-id = "<?php echo $todos['id'] ?>" />
		<h2 style="font-family: Fuzzy Bubbles;"><?php echo $todos['task'] ?></h2>
		<small style="font-family:Fuzzy Bubbles;"><?php echo date("M d, Y - h:i a ", strtotime($todos['datetime']));?></small>
	<?php } ?>
	</div>
</div>

<?php }?>

<script src="asset/js/jquery-3.2.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.erase').click(function(){
				const id = $(this).attr('id');

				$.post("app/delete.php",
					{
						id: id
					},
					(data) => {
						if(data){
							$(this).parent().hide(500);
						}
					}

				);
			});

			$(".check-box").click(function(e){
				const id = $(this).attr('data-todo-id');
				
				$.post('app/update.php',
					{
						id: id
					},
					(data) => {
						if(data != 'error'){
							const h2 = $(this).next();
							if(data == '1'){
								h2.removeClass('checked');
							}else{
								h2.addClass('checked');
							}
						}
					}
				);
			});

		});
	</script>