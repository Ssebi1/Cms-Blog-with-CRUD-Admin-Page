<!-- Data from db for Chart -->
<?php 
        $posts_draft_count          = num_of_query_where('posts','post_status','draft');
        $unapproved_comments_count  = num_of_query_where('comments','comment_status','unapproved');
        $posts_draft_count          = num_of_query_where('posts','post_status','draft');
        $subscriber_count           = num_of_query_where('users','user_role','subscriber');  
?>


<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() 
    {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Number", { role: "style" } ],
            ["Published Posts", <?php echo $posts_count - $posts_draft_count; ?>, "#337ab7"],
            ["Draft Posts", <?php echo $posts_draft_count; ?>, "#337ab7"],
            ["Approved Comments", <?php echo $comments_count - $unapproved_comments_count; ?>, "#5cb85c"],
            ["Unapproved Comments", <?php echo $unapproved_comments_count; ?>, "#5cb85c"],
            ["Admins", <?php echo $users_count - $subscriber_count; ?>, "#f0ad4e"],
            ["Subscribers", <?php echo $subscriber_count; ?>, "#f0ad4e"],
            ["Categories", <?php echo $categories_count; ?>, "#d9534f"]
        ]);

        var view = new google.visualization.DataView(data);
        
        var options = {

            width: '100%',
            height: 500,
            bar: {groupWidth: "85%"},
            legend: { position: "none" },          
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<div id="columnchart_values"></div>
<!-- /Google Chart -->