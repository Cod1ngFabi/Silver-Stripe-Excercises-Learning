<nav class="primary">
	<span class="nav-open-button">²</span>
	<ul>
		<% loop $Menu(1) %>
			<li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
		<% end_loop %>
		<li class="$LinkingMode"><a href="#ueber" >Über uns</a></li>
		<li class="$LinkingMode"><a href="#aktuelles" >Aktuelles</a></li>
		<li class="$LinkingMode"><a href="#kontakt" >Kontakt</a></li>
	</ul>
</nav>
