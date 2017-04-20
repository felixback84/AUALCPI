<div id="form-search">
	<form role="search" method="get" action="<?php echo home_url('/') ?>">
		 <div class="input-group">
			 <input type="search" class="form-control" placeholder="Estoy buscando..." value="<?php echo get_search_query() ?>" name="s" title="Search" />
			<span class="input-group-btn">
				<button type="submit" id="searchsubmit" value="Search" class="btn btn-default">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</button>
			</span>
		</div>
	</form>
</div>
