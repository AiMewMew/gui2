 <style>
     .card {
padding: 1rem;
border: 1px solid black;
margin: 1rem;
}
</style>
 <!-- Header -->
 <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>LATEST NEWS</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                       
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->




    
    

   <div class="container">
       <div class="row">
           <div class="col-lg-3"></div>
           <div class="col-lg-7">
           <div id="news">
  
             </div>
           </div>
       </div>
   </div>
   
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>   <script>
    var url = 'https://newsapi.org/v2/everything?' +
          'q=Apple&' +
          'from='+ new Date() +
          'sortBy=popularity&' +
          'apiKey=5821855c97564865ad0c397b5dd907f1';

          const container = document.getElementById('news');

$.ajax({
  url: url,
  cache: false,
  success: function(res){
      let card;
      for( let i=0; i<20; i++){
           card += `
     <div class="card mt-3">
       <div class="card-header">
       ${res.articles[i].author}
       </div>
       <div class="card-body">
        <h4> ${res.articles[i].title} </h4><br>
        ${res.articles[i].description}
       </div>
       <div class="card-footer">
       ${res.articles[i].publishedAt}
       
       </div>
   </div>
          `;
      }
      container.innerHTML += card;
  }
});
   </script>