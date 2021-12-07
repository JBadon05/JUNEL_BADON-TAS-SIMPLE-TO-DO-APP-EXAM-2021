	<div class="sub">
				<div class="label">
					
					<h1 style="text-align: center; font-family: Fredericka the Great; color:white;"><i class="fas fa-tasks"></i> My to-do list</h1>
				</div>

			<form action="app/add.php" method="POST" autocomplete="off" style="display:block;">
				<?php if(isset($_GET['message']) && $_GET['message'] == '?') { ?>
					
				<input style="font-family: Fuzzy Bubbles;" type="text" name="task" placeholder="This Field is Required"/>

				<button type="submit"><span><i class="fa fa-pencil"></i></span> Add</button>

				<?php } else { ?> 
				
				<input style="font-family: Fuzzy Bubbles;" type="text" name="task" placeholder="-- Let's Get Started --"/>

				<button type="submit"><span><i class="fa fa-pencil"></i></span> Add</button>

			<?php }?>
			</form>

	</div>