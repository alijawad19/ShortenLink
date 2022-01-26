<x-header />

<div class="row">
  <div class="column">
    <div class="card">
      <div class="innercard">
        <!-- <form action="shortenurl" method="post"> -->

        <p id="show_message" style="display: none">URL Shortened Successfully. </p>

        <form action="javascript:void(0)" method="post" id="ajax-form">
            @csrf
            <input type="text" name="title" placeholder="Enter title" required />
            <input type="text" name="url" placeholder="Enter URL" required />

            <button class="success" type="submit">Shorten URL</button>
            
            <span class="text-danger">@error('url'){{$message}}@enderror</span>

        </form>
      </div>
      
      <div class="innercard">
      <!-- <h2>ID: {{session('user_id')}}</h2>
      <h2>Email: {{session('user_email')}}</h2> -->
      
      <div id="table">
      @if(count($collection)==0)
      <h3>You have no shortened URLs.</h3>
      @else
        <table border="1">
        <caption><h2>{{session('username')}}'s All URLs</h2></caption>
          <thead>
            <tr style="text-align:center">
                <td>Title</td>
                <td>Short URL</td>
                <td>URL</td>
                <td>Date Created</td>
                <td>Copy</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{$item['title']}}</td>
                <td><div class="url">{{'http://127.0.0.1:8000/'.$item['short_url']}}</div></td>
                <td>{{$item['url']}}</td>
                <td>{{date('d-m-Y', strtotime($item['created_at']))}}</td>
                <td><button class="copy" >Copy</button>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function($){
  // hide messages 
  $("#show_message").hide();
  // on submit...
  $('#ajax-form').submit(function(e){
    e.preventDefault();
    
    // ajax
    $.ajax({
      type:"POST",
      url: "shortenurl",
      data: $(this).serialize(), // get all form field value in serialize form
      success: function(){
      $("#show_message").fadeIn();
      $("#ajax-form")[0].reset();
      $("#table").load(" #table");
      }
    });
  });  
  return false;
});

$(document).on('click',".copy",(ev)=>{
  let url = ev.target.closest('tr').querySelector('.url');
  let selection = window.getSelection();
  let range = document.createRange();
  range.selectNodeContents(url);
  selection.removeAllRanges();
  selection.addRange(range);
  console.dir( range.toString());
  document.execCommand('copy');
})

</script>

<x-footer />