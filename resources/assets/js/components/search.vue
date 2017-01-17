<template>
<div class="search">
		 <input class="form-control" v-model="query" type="text" name="q" placeholder="Search..." style="width: 300px" />
		 <ul v-if="posts.length > 0" class="results" >
			 <li v-for="post in posts">
				 <a :href="post.url">
			 		<div class="container-fluid">
			 			<div class="row-fluid">
				 			<div class="col-md-4"
								<img class="text-wrap" :src="post.post_image" style="width: 35%">
							</div>
							<div class="col-md-7" style="vertical-align: middle; display: inline-block;">
								<h3 class="thosm_no_align">{{ post.title }}</h3>
								<p class="thosm_no_align"> <strong>{{ post.author }}</strong></p>
							</div>
						</div>
					</div>
				 </a>
			 </li>
		 </ul>
</div>
</template>

<script>
export default {
  data() {
    return {
      query: '',
      posts: []
    }
  },
  watch: {
  	
	query: function() {
		if (this.query.length >= 5)
		{
			this.searchPosts();
		}
		else
		{
			this.posts = [];
		}
  		
  	}
  },
  methods: {
	searchPosts: _.debounce(function() {
	        var search = this;
	        search.posts = [];
	        axios.get('http://localhost:8000/api/search/' + search.query)
	          .then(function(response) {
	          	search.posts = response.data
	          })

	      }, 500)
		}
}
</script>

<style>
.search {
    position: relative;
    margin: 0 auto;
    width: 600px;
}

.search input:focus + .results { display: block }

.search .results:hover{ display: block }

.search .results {
    display: none;
    position: absolute;
    top: 35px;
    left: 0;
    right: 0;
    z-index: 10;
    padding: 0;
    margin: 0;
    border-width: 1px;
    border-style: solid;
    border-color: #cbcfe2 #c8cee7 #c4c7d7;
    border-radius: 3px;
    background-color: #fdfdfd;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
    background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
    background-image: linear-gradient(top, #fdfdfd, #eceef4);
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.search .results li { display: block }

.search .results a {
    display: block;
    position: relative;
    margin: 0 -1px;
    padding: 6px 40px 6px 10px;
    color: #808394;
    font-weight: 500;
    text-shadow: 0 1px #fff;
    border: 1px solid transparent;
    border-radius: 3px;
}

.search .results a span { font-weight: 200 }

.search .results a:before {
    content: '';
    width: 18px;
    height: 18px;
    position: absolute;
    top: 50%;
    right: 10px;
    margin-top: -9px;
    background: url("http://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
}

.search .results a:hover {
    text-decoration: none;
    color: #fff;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
    border-color: #2380dd #2179d5 #1a60aa;
    background-color: #338cdf;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
    background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
    background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
    background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
    background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
    background-image: linear-gradient(top, #59aaf4, #338cdf);
    -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
    -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
    -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
    -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
    box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
}

</style>
