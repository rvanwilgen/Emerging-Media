
	<?php if($_GET['type']): 	$type = $_GET['type']; // interested, parent
   					   else: 	$type = 'interested'; endif; ?>  
	
    <h1 id="page-title" class="shadow-text">Abonneren als <?php if($type == 'parent'): ?>Ouder<?php elseif($type == 'interested'): ?>Ge&iuml;nteresseerde<?php endif; ?></h1>
    
	<div id="subscribe" class="shadow">
    
    	<?php // Als er nog niet op submit(subscribe) is gedrukt
		if(!$_POST['subscribe-success']): ?>
        
            <!-- Todo: Melding bij foute invoer & Invoer converteren htmlentities + Afvangen als het email adress al staat ingechreven -->
            <form action="index.php?view=subscribe-success" method="post" id="form_subscribe">
            
            	<?php if($type == 'parent' || $type == 'employee' ): ?>
    
                    <input type="text" name="name" id="name" placeholder="Naam" value="<?php echo $_POST['name']; ?>" tabindex="1" size="99" class="required" /><br />
                    
                 <?php endif; ?>
                 
                    <!-- Todo: Check of dit wel echt een email adress is -->
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $_POST['email']; ?>" tabindex="2" size="99" class="required email" /><br />
                 
				<?php if($type == 'parent'): ?>
                
                	<div id="children">
                
                        <div id="child_1" class="child">
                        
                            <input type="text" name="child_name_1" id="child_name_1" placeholder="Naam van uw kind"  value="<?php echo $_POST['child_name']; ?>" tabindex="3" size="99" class="required" /><br />
                            <input type="text" name="child_class_1" id="child_class_1" placeholder="Klas van uw kind" value="<?php echo $_POST['child_class']; ?>" tabindex="4" size="3" /><br />
                                                
                        </div>
                        
                    </div><!-- children -->
                    
                    <a id="addchild" title="Kind toevoegen">Kind toevoegen</a>
                 
                <?php endif; ?>
                                
                <input type="hidden" name="type" id="type" value="<?php echo $type; ?>" />
                <input type="submit" id="submit" name="subscribe" value="inschrijven" class="shadow" />
    
            </form> 
        
        <?php endif; ?>  

    </div><!-- subscribe -->