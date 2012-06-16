<a class="logo" href="index.php">
	<h1>Tim Pei</h1>
</a>

<ul>
	<li<?php echo $active[1] ?>>
		<?php if ($current != 1) { 
				echo "<a class=\"link\" href=\"index.php\">About</a>"; 
			} else { 
				echo "<a class=\"currentlink\">About</a>"; 
			}?>
	</li>
	<li<?php echo $active[2] ?>>
		<?php if ($current != 2) { 
			echo "<a class=\"link\" href=\"portfolio.php\">Portfolio</a>"; 
		} else { 
			echo "<a class=\"currentlink\">Portfolio</a>"; 
		} ?>
	</li>
	<li><a class="link" href="https://github.com/timpei">Github</a></li>
	<li<?php echo $active[3] ?>>
		<?php if ($current != 3) { 
			echo "<a class=\"link\" href=\"contact.php\">Contact</a>"; 
		} else { 
			echo "<a class=\"currentlink\">Contact</a>"; 
		} ?>
	</li>
	
</ul>
