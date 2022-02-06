<x-header />

<style>
/* Full-width input fields */
input[type=text], input[type=url] {
  width: 35%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=url]:focus {
  background-color: #ddd;
  outline: none;
}
</style>

<div class="row">
  <div class="column">
    <div class="card">
      <div class="innercard">

        <div class="alert" id="show_message" style="display: none">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          URL Shortened Successfully.
        </div>
        
        @if(Session::has('success'))
        <div class="alert" id="alert_message" style="display: block">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          {{Session::get('success')}}
        </div>
        @endif

        @if(Session::has('delete'))
        <div class="delete-alert" id="alert_message" style="display: block">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          {{Session::get('delete')}}
        </div>
        @endif

        <div class="container">
        <form action="javascript:void(0)" method="post" id="ajax-form">
            @csrf
            <input type="text" name="title" placeholder="Enter title" required />
            <input type="url" name="url" value="https://" placeholder="Enter URL (eg: https://shortenlink.com)" required oninvalid="this.setCustomValidity('Please enter a URL. (eg: https://shortenlink.com)')" oninput="this.setCustomValidity('')" />

            <button class="success" type="submit">Shorten URL</button>
            
            <span class="text-danger">@error('url'){{$message}}@enderror</span>
        </form>
        </div>
        
      </div>
      
      <div class="innercard">
      
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
                <td>Edit</td>
                <td>Delete</td>
                <td>Copy Short URL</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{$item['title']}}</td>
                <td><div class="url">{{'http://127.0.0.1:8000/'.$item['short_url']}}</div></td>
                <td>{{$item['url']}}</td>
                <td>{{date('d-m-Y', strtotime($item['created_at']))}}</td>
                <td><a href={{"edit/".$item['id']}} type="button">Edit</a></td>
                <td><a href={{"delete/".$item['id']}} type="button">Delete</a></td>
                <td><button class="copy" >Click to Copy</button></td>
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
      $("#alert_message").hide();
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
