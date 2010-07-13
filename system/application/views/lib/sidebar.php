<div id="content-wrap">
				
			<div id="sidebar">
			
				
				<h3><?php echo $this->lang->line('side_sys');?></h3>
				<ul class="sidemenu">				
					<li> 
                                            <ul><h1><?php echo $this->lang->line('side_mem');?></h1>
                                            <?php 
                                                 $nguk = $this->sysinfo->system(); 
                                                 $total = $this->lang->line('side_mem_total');
                                                 $usage = $this->lang->line('side_mem_usage');
                                                 $free = $this->lang->line('side_mem_free');
                                                 echo "<li>$total : ".$nguk['total_mem']."Mb </li>" ;
                                                 echo "<li>$usage : ".$nguk['usage_mem']."Mb </li>" ;
                                                 echo "<li>$free : ".$nguk['free_mem']."Mb </li>" ;
                                            ?></ul>
                                             <ul><h1>Vserver</h1>
                                            <?php 
                                                 $home = $this->lang->line('side_vs_home');
                                                 $cap = $this->lang->line('side_vs_total');
                                                 $free_space = $this->lang->line('side_vs_free');
                                                 $remain = $this->lang->line('side_vs_rem');
                                                 echo "<li>$home : ".$nguk['vs_dir']."</li>" ;
                                                 echo "<li>$cap: ".$nguk['vs_cap']."</li>" ;
                                                 echo "<li>$free_space: ".$nguk['vs_free']."</li>" ;
                                                 echo "<li>$remain: ".$nguk['vs_max']." VPS</li>" ;
                                            ?></ul>
                                            
                                        </li>
							
				</ul>	
