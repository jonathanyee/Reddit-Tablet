var suffix = '.json?jsonp=?';

/*
 * Populate Second Column
 */
function getSubRedditLinks(url)
{  
   $.getJSON(
      url + suffix, 
      function foo(data) 
      { 
         var items = [];
         $.each(
            data.data.children, 
            function (i, post) 
            {
               var section = $('<section></section>').append('<a class="link" href="#"></a>');
               section.find('a.link').attr("title", post.data.permalink)
                                    .text(post.data.title);
               items.push(section[0].outerHTML);
            } 
         );
         $('#posts').empty().append(items.join(''));
      } 
   );
}

/*
 * Populate Third Column
 */
function getThread(url)
{
   console.log("http://www.reddit.com" + url + suffix);
   $('#content').empty();
   $.getJSON(
     "http://www.reddit.com" + url + suffix,
     function foo(data)
     {
         //OP post
          $.each(
            data[0].data.children,
            function (i, post) {
               $("#content").append('<h3><a href="' + post.data.url + '">' + post.data.title + '</a></h3>' );
               $("#content").append('by ' + post.data.author + ' with ' + post.data.num_comments + ' comments');
               $("#content").append('<p>' + post.data.selftext + '</p>');
               $("#content").append('<hr><br>' );
            }
          )

         //comment thread
         $.each(
            data[1].data.children,
            function (i, post) {

               $("#content").append( '<b>author</b>: ' + post.data.author );
               $("#content").append( '<br>' + post.data.body);

               printComment(post.data,1);

               $("#content").append( '<hr>' );
            }
         )
     }
   );
}

function printComment(comment, depth) 
{
	if (comment.replies) 
	{
      $.each (comment.replies.data.children, function (j, subcomment) 
      {
         $("#content").append( '<div class="comment depth-' + depth + '">' +
                                       '<b>author: </b>' + subcomment.data.author + 
                                       '<br>' + subcomment.data.body + 
                                       '</div>');
                                       
         printComment(subcomment.data, depth+1);
         
      });
   }
}