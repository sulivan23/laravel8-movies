var search = $('#search');
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
search.on('click', function(e){
    $.ajax({
        url : url+"/api/movies/list",
        type : 'POST',
        dataType : 'json',
        data : {
            title   : $("#search_title").val(),
            type    : $("#type").val(),
            year    : $("#years").val(),
        },
        headers : {
            'Authorization' : 'Bearer '+token_access
        },  
        beforeSend:function(){
            $(".movie-list").html("<p style='text-align:center'>Loading...</p>");
        },
        success:function(res){
            if(res.response == true){
                var html = "";
                for(i=0; i < res.data.length; i++){
                    html += '<div class="movie">'+
                                '<figure class="movie-poster">'+res.data[i].poster+'</figure>'+
                                '<div class="movie-title"><a href="'+url+'/movies/'+res.data[i].imdbID+'">'+res.data[i].title+'</a></div>'+
                                '<div class="movie-year">'+res.data[i].year+'</div>'+
                                '<form action="">'+
                                    '<button id="'+res.data[i].imdbID+'" name="addFav">+ Favorit Movie</button>'+
                                '</form>'+
                            '</div>';
                }
                $('.movie-list').html(html);
                addToFavMovies();
            }else{
                $('.movie-list').html('<p style="text-align:center">'+res.message+'</p>');
            }
        },
        error:function(jqueryXHR){
            $(".movie-list").html("");
            Toast.fire({
                type: 'error',
                title: jqueryXHR.responseText
            });
            if(jqueryXHR.responseText == "Token Is Expired, you will be redirect to login page in seconds"){
                setTimeout(() => {
                    window.location.href=url+"/logout";
                }, 3000);
            }
        }
    });
    var page = 2;
    $(window).on('scroll', function(e){
        var scrollTop = $(this).scrollTop();
        var windowHeight = $(document).height() - $(window).height();
        if(scrollTop - windowHeight == 0 || scrollTop - windowHeight == -0.5 ){
            loadMore(page);
            page++;
        }
        //debug
        console.log("scroll :"+$(this).scrollTop());
        console.log($(document).height() - $(window).height());
        console.log(scrollTop - windowHeight);
    });
    e.preventDefault();
});

loadMore = (page) => {
    $.ajax({
        url : url+"/api/movies/list",
        type : 'POST',
        dataType : 'json',
        data : {
            title   : $("#search_title").val(),
            type    : $("#type").val(),
            year    : $("#years").val(),
            page    : page
        },
        headers : {
            'Authorization' : 'Bearer '+token_access
        },  
        beforeSend: function(){
            $('.loading').css('display','block');
        },
        success:function(res){
            $('.loading').css('display','none');
            if(res.response == true){
                var html = "";
                for(i=0; i < res.data.length; i++){
                    html += '<div class="movie">'+
                                '<figure class="movie-poster">'+res.data[i].poster+'</figure>'+
                                '<div class="movie-title"><a href="'+url+'/movies/'+res.data[i].imdbID+'">'+res.data[i].title+'</a></div>'+
                                '<div class="movie-year">'+res.data[i].year+'</div>'+
                                '<form action="">'+
                                    '<button id="'+res.data[i].imdbID+'" name="addFav">+ Favorit Movie</button>'+
                                '</form>'+
                            '</div>';
                }
                $('.movie-list').append(html);
                addToFavMovies();
            }else{
                $('.loading').css('display','none');
            }
        },
        error:function(){
            Toast.fire({
                type: 'error',
                title: jqueryXHR.responseText
            });
            if(jqueryXHR.responseText == "Token Is Expired, you will be redirect to login page in seconds"){
                setTimeout(() => {
                    window.location.href=url+"/logout";
                }, 3000);
            }
        }
    });
}

addToFavMovies = () => {
    $("button[name='addFav']").on('click', function(e){
        var imdbId = $(this).attr('id');
        $.ajax({
            url : url+'/api/movies/add',
            type : 'POST',
            dataType : 'json',
            data : { imdb_id : imdbId },
            headers : {
                'Authorization' : 'Bearer '+token_access
            },
            beforeSend(){
                $("#"+imdbId).html("Loading...");
                $("#"+imdbId).attr("disabled", true);
            },
            success:function(res){
                if(res.is_success == true){
                    Toast.fire({
                        type: 'success',
                        title: res.message
                    });
                }else{
                    Toast.fire({
                        type: 'error',
                        title: res.message
                    });
                }
                $("#"+imdbId).html("+ Favorit Movie");
                $("#"+imdbId).attr("disabled", false);
            },
            error:function(jqueryXHR){
                Toast.fire({
                    type: 'error',
                    title: jqueryXHR.responseText
                });
                if(jqueryXHR.responseText == "Token Is Expired, you will be redirect to login page in seconds"){
                    setTimeout(() => {
                        window.location.href=url+"/logout";
                    }, 3000);
                }
            }
        });
        e.preventDefault();
    });
}


$(document).ajaxSuccess(function(event, xhr, settings ) {

    const observer = lozad('.lozad', {
        rootMargin: '10px 0px', // syntax similar to that of CSS Margin
        threshold: 1, // ratio of element convergence
        enableAutoReload: true // it will reload the new image when validating attributes changes
    });
    observer.observe();

});

$("#language").on('change', function(){
   window.location.href=url+"/language/"+$(this).val()
});

addToFavMovies();