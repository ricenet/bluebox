<?php if(!defined('IN_RAINTPL')){exit('Hacker attempt');}?><!-- template_editor | generated by RainTPL v 1.7.5 | www.RainTPL.com -->
<?php
	if( isset($var["in_ari"]) ){
?>
<html>
    <head>
        <link href="/recordings/theme/coda-slider-2.0a.css" rel="stylesheet" type="text/css" />


        <!-- Begin JavaScript -->
        <script type="text/javascript" src="/recordings/theme/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="/recordings/theme/js/jquery.coda-slider-2.0.js"></script>
        <script type="text/javascript">
            $().ready(function() {
                $('#coda-slider-9').codaSlider({
                    dynamicArrows: false
                });
            });
        </script>
        <!-- End JavaScript -->
    </head>
    <body>
        <?php
	}
	else{
?>
        <?=_('You are currently editing')?>
	<?php
		if( $var["custom"] != 0 ){
?>
        <?=_('a custom config template for extension')?> <?php echo $var["ext"];?>, <?=_('Model')?>: <?php echo $var["model"];?>
	<?php
		}
?>
	<?php
		if( $var["custom"] == 0 ){
?>
        <?=_('the template named')?> "<?php echo $var["template_name"];?>" <?=_('for Model')?>: <?php echo $var["model"];?>
	<?php
		}
?>
        <br />
        <form action="config.php?display=epm_templates" method="post">
	<?php
		if( $var["alt"] != 0 ){
?>
            <br/>
            <br />
            <?=_('Select Alternative File Configurations:')?>
	<?php echo $var["alt_configs"];?>
            <br/>
	<?php
		}
?>
            <br />
            <?=_('You can also use certain variables in your configs')?>:<br />
	-"{$srvip}" = <?=_('Server IP')?><br />
	-"{$mac}" = <?=_('Device\'s Mac Address')?><br />
	-"{$ext}" = <?=_('Device\'s Default Extension (Line 1 or Master)')?><br />
	-"{$diplayname}" = <?=_('Device\'s Description in FreePBX (Usually the Full Name)')?><br />
            <br />
            <?php
	}
?>

            <div class="coda-slider-wrapper">
                <div class="coda-slider preload" id="coda-slider-9">
		<?php
	if( isset( $var["template_editor"] ) ){
		$counter1 = 0;
		foreach( $var["template_editor"] as $key1 => $value1 ){ 
?> 
                    <div class="panel">
                        <div class="panel-wrapper">
                            <h2 class="title"><?php echo $value1["title"];?></h2>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php
		if( isset( $value1["data"] ) ){
			$counter2 = 0;
			foreach( $value1["data"] as $key2 => $value2 ){ 
?>
                                <tr>
                                    <td nowrap>
						<?php
			if( $value2["type"] == 'input' ){
?>
                                        <label><?php echo $value2["description"];?>: <input type='text' name='<?php echo $value2["key"];?>' value='<?php echo $value2["value"];?>' size="40"></label>
						<?php
			}
				elseif( $value2["type"] == 'radio' ){
?>
							<?php echo $value2["description"];?>
							<?php
					if( isset( $value2["data"] ) ){
						$counter3 = 0;
						foreach( $value2["data"] as $key3 => $value3 ){ 
?>
                                        <label><?php echo $value3["description"];?>: <input type='radio' name='<?php echo $value3["key"];?>' value='<?php echo $value3["value"];?>' <?php
						if( array_key_exists('checked',$value3) ){
?><?php echo $value3["checked"];?><?php
						}
?>></label>
							<?php
							$counter3++;
						}
					}
?>
						<?php
				}
					elseif( $value2["type"] == 'list' ){
?>
							<?php echo $value2["description"];?> <select name='<?php echo $value2["key"];?>'>
							<?php
						if( isset( $value2["data"] ) ){
							$counter3 = 0;
							foreach( $value2["data"] as $key3 => $value3 ){ 
?>
                                            <option value='<?php echo $value3["value"];?>' <?php
							if( array_key_exists('selected',$value3) ){
?><?php echo $value3["selected"];?><?php
							}
?>><?php echo $value3["description"];?></option>
							<?php
								$counter3++;
							}
						}
?>
                                        </select>
						<?php
					}
?>
                                    </td><td width="90%">
						<?php
					if( isset($value2["aried"]) ){
?>
                                        <label><input type='checkbox' name='ari_<?php echo $value2["ari"]["key"];?>' <?php
						if( isset($value2["ari"]["checked"]) ){
?><?php echo $value2["ari"]["checked"];?><?php
						}
?>><?=_('End User Editable (Through ARI Module)')?></label>
						<?php
					}
?>
                                    </td>
                                </tr>
						<?php
					if( $value2["type"] == 'break' ){
?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
						<?php
					}
?>
					<?php
						$counter2++;
					}
				}
?>
                            </table>
                        </div>
                    </div>
		<?php
					$counter1++;
				}
			}
?>
                </div><!-- .coda-slider -->
            </div><!-- .coda-slider-wrapper -->
            <input name="id" type="hidden" value="<?php echo $var["hidden_id"];?>">
            <input name="custom" type="hidden" value="<?php echo $var["hidden_custom"];?>">
            <?php
			if( !isset($var["in_ari"]) ){
?>
            <input type="submit" name="button_save_template" value="<?=_('Save Template');?>">
        </form>
        <?php
			}
?>

<!--/ template_editor -->
