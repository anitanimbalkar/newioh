// Retrieve wordpress page contents 

var base_url = '/wordpress';

 /*
	@params category  
	@params divid to which the content need to be set
 */ 
function setcontentbycategory(category,divid)
{
    var response = "";
    $.ajax({
        type: "POST", 
        url: base_url + "?json=get_category_posts&slug="+category,
		crossDomain: true,
        success: function(response)
        {   
			$(divid).html(response.posts[0].content);
        },
        dataType: "jsonp"    
    })    
}

/*
	@params main category name
 */ 
function setcontentbysubcategory(category)
{
    var response = "";
    $.ajax({
        type: "POST", 
        url: base_url + "?json=get_category_posts&slug="+category+"&count=20",
		crossDomain: true,
        success: function(response)
        {   
			$.each(response.posts, function(idx,obj){
				var divid = "#"+obj.slug;
				$(divid).html(obj.content);
			});			
        },
        dataType: "jsonp"    
    })    
}
/*
	setting the latest article to the marquee
	tag_slug set as latestarticle
*/
function setlatestarticle()
{
    var response = "";
    $.ajax({
        type: "POST", 
        url: base_url + "?json=get_tag_posts&tag_slug=latestarticle",
		crossDomain: true,
        success: function(response)
        {    
			var url = response.posts[0].url;
			var displaycontent = response.posts[0].content.substring(0,100)+'<a target="_blank" href='+url+'>...</a>';
			var output='<div class="previewtext"><marquee title="click here" scrollamount="6" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><img src="/ayushman/assets/images/alert.gif" style="height:10px;" border="0"/>';
			output += displaycontent;
			output += "</marquee></div>";
			$('#marqueespan').html(output);
			
        },
        dataType: "jsonp"    
    })    
	
}
/* Set the Wordpress content */
setcontentbysubcategory('homepage');
setlatestarticle();
