   var listOfItems = [];
		
		$(document).ready(function() {
      $.getJSON(
				"http://www.reddit.com/.json?jsonp=?",
		      function foo(data)
		      {
		      	$.each(
						data.data.children,
		            function (i, post) {

							var item = {
						               title: post.data.title,
						               link: post.data.url,
						               ups: post.data.ups,
											downs: post.data.downs
							};

						   listOfItems.push(item);
						}
					)

					//posts
					 for (var i = 1; i <= listOfItems.length; i++) {
					    $("#posts").append('<section>' +
						                    '<a href="#post=post-' + i + '">' + listOfItems[i-1].title + '</a>' +
						                    '</section>'
					                        );
					 }

					 //content
					 for (var i = 1; i <= listOfItems.length; i++) {
					    $("#content").append('<div id="post-' + i + '">' +
					                        '<a href="' + listOfItems[i-1].link + '">' + listOfItems[i-1].title + '</a>' +
													'<p>Up: ' + listOfItems[i-1].ups + '<br />' +
													'Down: ' + listOfItems[i-1].downs + '</p>' +
					                        '</div>'
					                        );
					 }
					
					var list = [];
					for (var i = 1; i <= listOfItems.length; i++) {
						list.push('post-' + i);
					}
					
					 activatables('post', list);
				}	
			);
			
			
			
		});
		
