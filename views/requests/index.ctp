<?php foreach($requests as $index => $request):?>
<div class="request">
<div class="timeline">
	<strong><?php echo $request['Associate']['name'];?></strong> requested:<br />
	<span><?php echo $request['Item']['name'];?>: <?php echo $request['Request']['quantity'];?> <?php echo $request['ItemUnitType']['name'];?></span><br />
	(<i>on <?php echo $request['Request']['modified'];?> by <?php echo $request['User']['name'];?></i>)
</div>
<div class="share">
	<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>			
	<a name="fb_share">Share on Facebook</a>
</div>
</div>
<?php endforeach;?>