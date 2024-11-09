<div class="container-fluid">
    <dic class="row">
        <% loop Regions %>
            <div class="region region-$Pos(0) col">
                <h2>$Title</h2>
                <h3>$Subtitle</h3>
                <p>$Description</p>
                <a href="$Link" target="_blank">$Photo.Fit(720,255)</a>
            </div>
        <% end_loop %>
    </div>
</div>
<style>
div.region {
        padding: 20px;
        margin: 0 0 20px 0;
        border: solid 1px black;
        background-color: #34B298;
        text-align:center;
        width: 50%;
    }
</style>
