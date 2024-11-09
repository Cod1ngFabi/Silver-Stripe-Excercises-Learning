<header class="header container-fluid" role="banner">
	<div class="inner row align-items-start">
		<div class="unit size4of4 lastUnit col-12">
			<div class="HeaderImage">
        		$Logo.SetWidth(600)
    		</div> 
			<a href="$BaseHref" class="brand" rel="home">
				<h1>$SiteConfig.Title</h1>
				<% if $SiteConfig.Tagline %>
				<p>$SiteConfig.Tagline</p>
				<% end_if %>
			</a>
			<% if $SearchForm %>
				<span class="search-dropdown-icon">L</span>
				<div class="search-bar">
					$SearchForm
				</div>
			<% end_if %>
			<% include Navigation %>
		</div>
	</div>
</header>
