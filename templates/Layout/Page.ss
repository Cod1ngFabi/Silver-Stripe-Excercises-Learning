<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<div class="content">$Content</div>
	</article>
</div>
<% loop $FeaturedProperties %>
<div class="item col-md-4">
    <div class="image">
        <a href="$Link">
            <h3>$Title</h3>
            <span class="location">$Region.Title</span>
        </a>
        $PrimaryPhoto.Fill(220,194)
    </div>
    <div class="price">
        <span>$PricePerNight.Nice</span><p>per night<p>
    </div>
    <ul class="amenities">
        <li><i class="icon-bedrooms"></i> $Bedrooms</li>
        <li><i class="icon-bathrooms"></i> $Bathrooms</li>
    </ul>
</div>
<% end_loop %>

